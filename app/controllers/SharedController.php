<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * pengguna_Username_value_exist Model Action
     * @return array
     */
	function pengguna_Username_value_exist($val){
		$db = $this->GetModel();
		$db->where("Username", $val);
		$exist = $db->has("pengguna");
		return $exist;
	}

	/**
     * pengguna_Email_value_exist Model Action
     * @return array
     */
	function pengguna_Email_value_exist($val){
		$db = $this->GetModel();
		$db->where("Email", $val);
		$exist = $db->has("pengguna");
		return $exist;
	}

	/**
     * suratkeluar_Nama_Tim_Kerja_option_list Model Action
     * @return array
     */
	function suratkeluar_Nama_Tim_Kerja_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Kode_Tim AS value,Nama_Tim_Kerja AS label FROM namatimkerja";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	function permintaan_RO_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Kode AS value,Keterangan AS label FROM kode_permintaan";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	function dokumentasi_Kategori_option_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Kode_Kategori AS value,Nama_Kategori AS label FROM kategori_dokumentasi";
		$queryparams = null;
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Subkode_Sensus_option_list Model Action
     * @return array
     */
	function suratkeluar_Subkode_Sensus_option_list($lookup_Kode_Sensus){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Subkode AS value,keterangan AS label FROM kodesurveisensus WHERE Kode= ? AND Subkode <> '' AND Klasifikasi = ''" ;
		$queryparams = array($lookup_Kode_Sensus);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Bagian_Sensus_option_list Model Action
     * @return array
     */
	function suratkeluar_Bagian_Sensus_option_list($lookup_Kode_Sensus, $lookup_Subkode_Sensus){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Klasifikasi AS value,keterangan AS label FROM kodesurveisensus WHERE Kode= ? AND Subkode= ? AND Klasifikasi <> '' AND Subklasifikasi = ''" ;
		$queryparams = array($lookup_Kode_Sensus, $lookup_Subkode_Sensus);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Sub_Bagian_Sensus_option_list Model Action
     * @return array
     */
	function suratkeluar_Sub_Bagian_Sensus_option_list($lookup_Kode_Sensus, $lookup_Subkode_Sensus, $lookup_Bagian_Sensus){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Klasifikasi AS value,keterangan AS label FROM kodesurveisensus WHERE Kode= ? AND Subkode= ? AND Klasifikasi = ?  AND Subklasifikasi <> ''" ;
		$queryparams = array($lookup_Kode_Sensus, $lookup_Subkode_Sensus, $lookup_Bagian_Sensus);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Subkode_Klasifikasi_option_list Model Action
     * @return array
     */
	function suratkeluar_Subkode_Klasifikasi_option_list($lookup_Kode_Klasifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Subkode AS value,Keterangan AS label FROM kodeklasifikasifasilitatif WHERE Kode= ? AND Subkode <> '' AND Klasifikasi = ''" ;
		$queryparams = array($lookup_Kode_Klasifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Bagian_Klasifikasi_option_list Model Action
     * @return array
     */
	function suratkeluar_Bagian_Klasifikasi_option_list($lookup_Kode_Klasifikasi, $lookup_Subkode_Klasifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Klasifikasi AS value,keterangan AS label FROM kodeklasifikasifasilitatif WHERE Kode= ? AND Subkode= ? AND Klasifikasi <> '' AND Subklasifikasi = ''" ;
		$queryparams = array($lookup_Kode_Klasifikasi, $lookup_Subkode_Klasifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	function suratkeluar_Sub_Bagian_Klasifikasi_option_list($lookup_Kode_Klasifikasi, $lookup_Subkode_Klasifikasi, $lookup_Bagian_Klasifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Klasifikasi AS value,keterangan AS label FROM kodeklasifikasifasilitatif WHERE Kode= ? AND Subkode= ? AND Klasifikasi = ?  AND Subklasifikasi <> ''" ;
		$queryparams = array($lookup_Kode_Klasifikasi, $lookup_Subkode_Klasifikasi, $lookup_Bagian_Klasifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * surat_tugas_number Model Action
     * @return array
     */
	public function surat_tugas_number($Nama_Tim_Kerja) {
		$db = $this->GetModel();
		$currentYear = date('Y');
	
		// Correct SQL syntax and parameters array
		$sqltext = "SELECT max(Nomor) as maxID FROM surat_tugas WHERE Nama_Tim_Kerja = ? AND YEAR(Tanggal_Surat) = ?";
		$params = array($Nama_Tim_Kerja, $currentYear);
		$result = $db->rawQueryValue($sqltext, $params);
	
		$idMax = !empty($result) ? $result[0] : null;
		$noUrut = 0;
		if (!empty($idMax)) {
			$noUrut = (int)substr($idMax, 2, 3);
		}
		$noUrut++;
		$newID = "B-" . sprintf("%03d", $noUrut);
	
		// Ensure JSON response format
		header('Content-Type: application/json');
		$response = array('success' => true, 'nomor' => $newID);
		echo json_encode($response);
		exit();
	}
	

	/**
     * getcount_suratmasuk Model Action
     * @return Value
     */
	function getcount_suratmasuk(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM surat_masuk";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_suratkeluar Model Action
     * @return Value
     */
	function getcount_suratkeluar(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM suratkeluar";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_surattugas Model Action
     * @return Value
     */
	function getcount_surattugas(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM surat_tugas";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
     * getcount_sk Model Action
     * @return Value
     */
	function getcount_sk(){
		$db = $this->GetModel();
		$sqltext = "SELECT COUNT(*) AS num FROM surat_keputusan";
		$queryparams = null;
		$val = $db->rawQueryValue($sqltext, $queryparams);
		
		if(is_array($val)){
			return $val[0];
		}
		return $val;
	}

	/**
	 * getcount by teamwork
	 */
	function getcount_bytim(){
		$db = $this->GetModel();
		
		// SQL untuk menampilkan semua tim dan menggabungkan khusus kode '18100'
		$sqltext = "
			SELECT CASE 
						WHEN ntk.Kode_Tim = '18100' THEN 'Tim 18100'
						ELSE ntk.Nama_Tim_Kerja 
					END AS Nama_Tim_Kerja, 
					COUNT(st.id) AS num
			FROM surat_tugas st
			JOIN namatimkerja ntk ON st.Nama_Tim_Kerja = ntk.Kode_Tim
			GROUP BY CASE 
						WHEN ntk.Kode_Tim = '18100' THEN 'Tim 18100'
						ELSE ntk.Nama_Tim_Kerja 
					END
		";
		
		$val = $db->rawQuery($sqltext);
		
		return $val;
	}
	
	
}
