function getIOTA(){

	let iota = new IOTA({
		'host': 'https://testnet140.tangle.works',
		'port': '443'
	});

	return iota;
}

function mostrarOpciones(accion){
	if(accion=='crearChannel'){
		document.getElementById('usarChannelContainer').style.display = "none";
		document.getElementById('crearChannelContainer').style.display = "block";
	}else if(accion=='usarChannel'){
		document.getElementById('usarChannelContainer').style.display = "block";
		document.getElementById('crearChannelContainer').style.display = "none";
	}
}

function generarRoot(){
	if(document.getElementById('claveChannel').value!=''){
		document.getElementById('divRoot').style.display = "block";
		document.getElementById('divGenRoot').style.display = "none";
		document.getElementById('loader').style.display = "";
		generate('crearChannel');

	}
}

function iniciarChannel(){
	if(document.getElementById('rootIngresado').value!='' && document.getElementById('claveChannelIngresado').value!=''){
		document.getElementById('divIniciar').style.display = "none";
		document.getElementById('loaderIniciar').style.display = "";
		generate('usarChannel');
	}

}

function getDateAndTime(){
	let a = new Date();
	let year = a.getUTCFullYear();
	let month = (a.getUTCMonth()+1) < 10 ? '0' + (a.getUTCMonth()+1) : (a.getUTCMonth()+1);
	let date = a.getUTCDate() < 10 ? '0' + a.getUTCDate() : a.getUTCDate();
	let hour = a.getUTCHours() < 10 ? '0' + a.getUTCHours() : a.getUTCHours();
	let min = a.getUTCMinutes() < 10 ? '0' + a.getUTCMinutes() : a.getUTCMinutes();
	let sec = a.getUTCSeconds() < 10 ? '0' + a.getUTCSeconds() : a.getUTCSeconds();
	let time = date + '/' + month + '/' + year + ' ' + hour + ':' + min + ':' + sec ;
	return time;
}

function enviarATangle(){
	if(document.getElementById('btnEnviar').value!=''){
		document.getElementById('divEnviar').style.display = "none";
		document.getElementById('loaderEnviar').style.display = "";
		generate('enviarMsgATangle');
	}

}

let mamState;
let intervalInstance;

function generate(accion) {
	let iota = getIOTA();

	const securityLevel = 2;
	const channelMode = 'restricted';

	let key = null;
	let keyString = null;
	if (accion == 'crearChannel')
		keyString = document.getElementById('claveChannel').value;
	else
		keyString = document.getElementById('claveChannelIngresado').value;

	keyString = keyString.trim();

	if(channelMode == 'restricted' && keyString == ""){
		alert('A key is required for a Restricted channel');
		throw new Error('Abort javascript: Enter a valid key');
	}

	if(channelMode == 'restricted' && keyString != "" && iota.utils.toTrytes(keyString) == null){
		alert('The encryption key contains invalid ASCII character(s)');
		throw new Error('Abort javascript: Enter a valid key');
	}

	let Mam = require('mam.web.js');

	if (accion == 'crearChannel') {
			mamState = Mam.init(iota, undefined, securityLevel);
	} else if(accion == 'usarChannel') {
		mamState = Mam.init(iota);
	}

	if (accion == 'crearChannel' || accion == 'usarChannel') {
			key = iota.utils.toTrytes(keyString);
			mamState = Mam.changeMode(mamState, 'restricted', key);
	}

	if(accion == 'crearChannel' || accion == 'enviarMsgATangle') {

		const publish = async function(packet) {

			let trytes = iota.utils.toTrytes(JSON.stringify(packet));

			if(accion=='enviarMsgATangle'){
				mamState.channel.start = parseInt(sessionStorage.getItem('start'));
				mamState.channel.next_root = sessionStorage.getItem('nextRoot');
			}

			let message = Mam.create(mamState, trytes);
			mamState = message.state;

			await Mam.attach(message.payload, message.address);
			return message.root;
		}

		const generateJSON = function(){
			let mensaje;
			let flagSeed;
			if(accion=='enviarMsgATangle'){
				mensaje = document.getElementById('msg').value;
				document.getElementById('msg').value="";
				flagSeed = 0;
			}
			else{
				mensaje = mamState.seed;
				flagSeed=1;
			}
			let dateTime = getDateAndTime();
			let json = {"flagSeed": flagSeed,"data": mensaje, "dateTime":dateTime};
			return json;
		}

		const executeDataPublishing = async function() {
			let json = generateJSON();
			let root = await publish(json);

			if(accion=='crearChannel'){
				document.getElementById('root').value = root;
				document.getElementById('loader').style.display = "none";
				document.getElementById('divGenRoot').style.display = "";
			}


		}
		executeDataPublishing();



	}
	if(accion == 'usarChannel') {
		let root = document.getElementById('rootIngresado').value;


		if(!iota.valid.isAddress(root)){
			alert('Invalid root');
			throw new Error('Abort javascript: Enter a valid root');
		}

		const executeDataRetrieval = async function(rootVal, keyVal) {
			let resp = await Mam.fetch(rootVal, channelMode, keyVal);
			let json;
			document.getElementById('txtAreaMensajes').value = "";
			let contStart = 0;
			resp.messages.forEach(function(msg){
				json = JSON.parse(iota.utils.fromTrytes(msg));
				if(contStart==0){
					sessionStorage.setItem('seed',json.data);
					if(accion=='usarChannel'){
						document.getElementById('divChat').style.display = "block";
						document.getElementById('loaderIniciar').style.display = "none";
						document.getElementById('divIniciar').style.display = "";
					}
					document.getElementById('txtAreaMensajes').value = json.dateTime+", "+"msg: "+"Creacion del channel"+"\n";
				}else{
					let display = json.dateTime+", "+"msg: "+json.data+"\n";
					document.getElementById('txtAreaMensajes').value += display;
				}
				contStart++;
			});
			
			document.getElementById('loaderEnviar').style.display = "none";
			document.getElementById('divEnviar').style.display = "";
			sessionStorage.setItem('start',contStart);
			sessionStorage.setItem('nextRoot',resp.nextRoot);
			mamState = Mam.init(iota,sessionStorage.getItem('seed'),securityLevel);
			key = iota.utils.toTrytes(keyString);
			mamState = Mam.changeMode(mamState, 'restricted', key);
		}

		intervalInstance = setInterval(function(){executeDataRetrieval(root,key);}, parseInt(4)*1000);




	}
}
