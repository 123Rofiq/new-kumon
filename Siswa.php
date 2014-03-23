<?php

/**
 * This is the model class for table "siswa".
 *
 * The followings are the available columns in table 'siswa':
 * @property integer $id_siswa
 * @property string $NIK
 * @property string $nama_siswa
 * @property string $alamat
 * @property string $sekolah
 * @property string $kelas
 * @property string $mata_pelajaran
 * @property string $awal_masuk
 * @property integer $nilai_tes
 * @property string $level_sekarang
 * @property string $level_penempatan
 */
class Siswa extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Siswa the static model class
	 */
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'siswa';
	}

	protected function beforeValidate() 
 {
   parent::beforeValidate();
   
   if($this->isNewRecord)
   {
     $criteria=new CDbCriteria;      //kita menggunakan criteria untuk mengetahui nomor terakhir dari database
     $criteria->select = 'NIK';   //yang ingin kita lihat adalah field "nilai1"
     $criteria->limit=1;             // kita hanya mengambil 1 buah nilai terakhir
     $criteria->order='NIK DESC';  //yang dimbil nilai terakhir
     $last = $this->find($criteria);
     if($last)   // jika ternyata ada nilai dalam data tersebut maka nilai nya saat ini tinggal di tambah 1 dari data sebelumya
     {
       $newID = (int)substr($last->NIK,6) + 1;
       $newID = 'kumon-'.$newID;
     }
     else  //jika ternyata pada tabel terebut masih kosong, maka akan di input otomatis nilai "sabit-1" karena memang belum ada sebelumnya nilai lain
     {
       $newID = 'kumon-1';
     }
     $this->NIK=$newID; // nilai1 di set nilai yang sudah di dapat tadi
  } 
  return true;
 }

	/**
	 * @return array validation rules for model attributes.
	 */

	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kelas, mata_pelajaran, awal_masuk, nilai_tes, level_sekarang, level_penempatan', 'required'),
			array('nilai_tes', 'numerical', 'integerOnly'=>true),
			array('NIK, kelas, level_sekarang', 'length', 'max'=>10),
			array('nama_siswa', 'length', 'max'=>15),
			array('mata_pelajaran', 'length', 'max'=>50),
			array('alamat', 'length', 'max'=>50),
			array('sekolah', 'length', 'max'=>20),
			//array('awal_masuk','date','format'=>'dd-mm-yy'),
			array('level_penempatan', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_siswa, NIK, nama_siswa, alamat, sekolah, kelas, mata_pelajaran, awal_masuk, nilai_tes, level_sekarang, level_penempatan', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'mata_pelajaran'=>array(self::BELONGS_TO,'mata_pelajaran','mata_pelajaran'),
			'level'=>array(self::BELONGS_TO,'level','level'),
		);
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */

	public function attributeLabels()
	{
		return array(
			'id_siswa' => 'Id Siswa',
			'NIK' => 'Nik',
			'nama_siswa' => 'Nama Siswa',
			'alamat' => 'Alamat',
			'sekolah' => 'Sekolah',
			'kelas' => 'Kelas',
			'mata_pelajaran' => 'Mata Pelajaran',
			'awal_masuk' => 'Awal Masuk',
			'nilai_tes' => 'Nilai Tes',
			'level_sekarang' => 'Level Sekarang',
			'level_penempatan' => 'Level Penempatan',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_siswa',$this->id_siswa);
		$criteria->compare('NIK',$this->NIK,true);
		$criteria->compare('nama_siswa',$this->nama_siswa,true);
		$criteria->compare('alamat',$this->alamat,true);
		$criteria->compare('sekolah',$this->sekolah,true);
		$criteria->compare('kelas',$this->kelas,true);
		$criteria->compare('mata_pelajaran',$this->mata_pelajaran,true);
		$criteria->compare('awal_masuk',$this->awal_masuk,true);
		$criteria->compare('nilai_tes',$this->nilai_tes);
		$criteria->compare('level_sekarang',$this->level_sekarang,true);
		$criteria->compare('level_penempatan',$this->level_penempatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

}
