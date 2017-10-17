function showModalUpdateCommand(button){
	var modal  	= $('#modalupdatecommand');
	var id 		= $(button).data('id');
	var nama 	= $(button).data('name');
	var use 	= $(button).data('use');
	var desc 	= $(button).data('desc');
	var opt 	= $(button).data('opt');
	var example 	= $(button).data('example');
		
	// Show Modal
	modal.find('input[name=id]').val(id);
	modal.find('input[name=name]').val(nama);
	modal.find('input[name=use]').val(use);
	modal.find('input[name=desc]').val(desc);
	modal.find('input[name=opt]').val(opt);
	modal.find('input[name=example]').val(example);
		
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalDetailCommand(button){
	var modal  	= $('#modaldetailcommand');
	var id 		= $(button).data('id');
	var use 	= $(button).data('use');
	var example	= $(button).data('example');
	var opt 	= $(button).data('opt');
		
	// Show Modal
	modal.find('input[name=id]').val(id);
	modal.find('label[for=use]').html(use);
	modal.find('label[for=example]').html(example);
	modal.find('label[for=opt]').html(opt);
		
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalUpdateUser(button){
	var modal  	= $('#modalupdateuser');
	var id 		= $(button).data('id');
	var nis 	= $(button).data('nis');
	var nama 	= $(button).data('name');
	var kelas 	= $(button).data('class');
	var email 	= $(button).data('email');
	var level 	= $(button).data('level');
		
	// Show Modal
	modal.find('input[name=id]').val(id);
	modal.find('input[name=nis]').val(nis);
	modal.find('input[name=name]').val(nama);
	modal.find('select[name=class]').val(kelas);
	modal.find('input[name=email]').val(email);
	modal.find('select[name=level]').val(level);
	
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalUpdatePassword(button){
	var modal    = $('#modalupdatepassword');
	var id 		 = $(button).data('id');
	var password = $(button).data('password');
		
	// Show Modal
	modal.find('input[name=id]').val(id);
	modal.find('input[name=password]').val(password);
	
	modal.modal({backdrop: 'static', keyboard: false});
}

function showModalUpdateServer(button){
	var modal  		= $('#modalupdateserver');
	var servercpu 	= $(button).data('servercpu');
	var serverram 	= $(button).data('serverram');
	var serverswap 	= $(button).data('serverswap');
	var serveros 	= $(button).data('serveros');
	var serverip 	= $(button).data('serverip');
	var dockerver 	= $(button).data('dockerver');
	var dockeros 	= $(button).data('dockeros');
	var wettydir 	= $(button).data('wettydir');
	var wettyport 	= $(button).data('wettyport');
	var vcpackage 	= $(button).data('vcpackage');
	var username 	= $(button).data('username');
	var password 	= $(button).data('password');
		
	// Show Modal
	modal.find('input[name=servercpu]').val(servercpu);
	modal.find('input[name=serverram]').val(serverram);
	modal.find('input[name=serverswap]').val(serverswap);
	modal.find('input[name=serveros]').val(serveros);
	modal.find('input[name=serverip]').val(serverip);
	modal.find('input[name=dockerver]').val(dockerver);
	modal.find('input[name=dockeros]').val(dockeros);
	modal.find('input[name=wettydir]').val(wettydir);
	modal.find('input[name=wettyport]').val(wettyport);
	modal.find('input[name=vcpackage]').val(vcpackage);
	modal.find('input[name=username]').val(username);
	modal.find('input[name=password]').val(password);
	
	modal.modal({backdrop: 'static', keyboard: false});
}