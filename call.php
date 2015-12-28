$preset=DeliPreset::model()->with(array('tasks','tasks.preusn','tasks.preusn.usnitems','tasks.predsn','tasks.predsn.dsnitems','dailytasks','weeklytasks'))->FindByPk($deli);
