var validation ={
	required: function(value)
	{
		if(value!=='')
			return true;
		return false;
	},
	date: function (value)
	{
		return true;
	}
}