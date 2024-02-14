# testapp


 C:\xampp\htdocs > composer create-project Laravel/laravel tastapp   (app name=teastapp)


localhost/tastapp/public/ (--> check your browser)


filename===   routes | 
	             - web.php   (define- urls);


filename ===  resouces |	
			- views |	
				 welcome.blade.php  (default page )



Route::get('/', function () {
    return view('welcome');
});


Route ::get('/sachin',function(){    
    return view(('hello'));
});



define urls('/sachin and any name')
