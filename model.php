public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'tasks' => array(self::HAS_MANY, 'PresetTasks', 'deli_id'),
		'dailytasks' => array(self::HAS_MANY, 'PresetDaily', 'deli_id'),
		'weeklytasks'=>array(self::HAS_MANY,'PresetWeekly','deli_id')
		);
	}
	
	
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'preusn' => array(self::HAS_MANY, 'PresetUsn', 'task_id'),
		'predsn' => array(self::HAS_MANY, 'PresetDsn', 'task_id'),
		);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'dsnitems' => array(self::HAS_MANY, 'PresetDsnitems', 'dsn_id'),
		);
	}
public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'usnitems' => array(self::HAS_MANY, 'PresetUsnitems', 'usn_id'),
		);
	}
