	function price_drop(sub_id)
    	{
    		var price = $('#price').val();
    		window.location.href="http://127.0.0.1/project2/sort.php?id="+sub_id+"&sort="+price;
    	}