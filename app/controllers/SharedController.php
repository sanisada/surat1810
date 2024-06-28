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

	/**
     * suratkeluar_Subkode_Sensus_option_list Model Action
     * @return array
     */
	function suratkeluar_Subkode_Sensus_option_list($lookup_Kode_Sensus){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Subkode AS value,keterangan AS label FROM kodesurveisensus WHERE Kode= ?" ;
		$queryparams = array($lookup_Kode_Sensus);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Bagian_Sensus_option_list Model Action
     * @return array
     */
	function suratkeluar_Bagian_Sensus_option_list($lookup_Subkode_Sensus){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Bagian AS value,keterangan AS label FROM kodesurveisensus WHERE Subkode= ?" ;
		$queryparams = array($lookup_Subkode_Sensus);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Subkode_Klasifikasi_option_list Model Action
     * @return array
     */
	function suratkeluar_Subkode_Klasifikasi_option_list($lookup_Kode_Klasifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Subkode AS value,Keterangan AS label FROM kodeklasifikasifasilitatif WHERE Kode= ?" ;
		$queryparams = array($lookup_Kode_Klasifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
	}

	/**
     * suratkeluar_Bagian_Klasifikasi_option_list Model Action
     * @return array
     */
	function suratkeluar_Bagian_Klasifikasi_option_list($lookup_Subkode_Klasifikasi){
		$db = $this->GetModel();
		$sqltext = "SELECT  DISTINCT Bagian AS value,Keterangan AS label FROM kodeklasifikasifasilitatif WHERE Subkode= ?" ;
		$queryparams = array($lookup_Subkode_Klasifikasi);
		$arr = $db->rawQuery($sqltext, $queryparams);
		return $arr;
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

}
