require('./bootstrap');

create = document.getElementById('create');
if(create){	
	route = document.getElementById('create_user').value;
	create.addEventListener('submit',(e)=>{
		username = document.getElementById('username').value;	
		password = document.getElementById('password').value;
		cpassword = document.getElementById('cpassword').value;
		email = document.getElementById('email').value;
		status = document.getElementById('status').value;
		position = document.getElementById('position').value;
		tokenku = document.getElementById('_tokenku').value;
	e.preventDefault();
	axios.post(route,{
		username,
		password,
		cpassword,
		email,
		status,
		position
	},{headers:{_token:tokenku}}).then((response)=>{
		
		if(response.data.message == 'failed'){
			alert(response.data.data);
		}else{
			alert(response.data.message);
			window.location = create.getAttribute('action');
		}
	}).catch((error)=>{window.location = create.getAttribute('action');})
	
})	
}

shown = document.getElementById('shown');
if(shown){
	delete_route = document.getElementById('delete_route').value;
	edit_route = document.getElementById('edit_route').value;
	tokenku = document.getElementById('_tokenku').value;
	shown.addEventListener('submit',(e)=>{
		e.preventDefault();
		username = document.getElementById('username').value;	
		password = document.getElementById('password').value;
		cpassword = document.getElementById('cpassword').value;
		email = document.getElementById('email').value;
		status = document.getElementById('status').value;
		position = document.getElementById('position').value;

		axios.post(edit_route,{
		username,
		password,
		cpassword,
		email,
		status,
		position
	},{headers:{_token:tokenku}}).then((response)=>{
		
		if(response.data.message == 'failed'){
			alert(response.data.data);
		}else{
			alert(response.data.message);
			location.reload();
		}
	}).catch((error)=>{})
	})

	delete_user = document.getElementById('delete_user');
	delete_user.addEventListener('click',(e)=>{
		e.preventDefault();
		axios.get(delete_route,{headers:{_token:tokenku}}).then((response)=>{
		if(response.data.message == 'failed'){
			alert(response.data.data);
		}else{
			alert(response.data.message);
			window.location = shown.getAttribute('action');
		}
	}).catch((error)=>{})	

	})
}
