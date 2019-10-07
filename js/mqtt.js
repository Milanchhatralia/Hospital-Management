
  // Create a client instance
	  client = new Paho.MQTT.Client("*link to coonect*", 30680,"web_" + parseInt(Math.random() * 100, 10)); 
	  //Example client = new Paho.MQTT.Client("m11.cloudmqtt.com", 32903, "web_" + parseInt(Math.random() * 100, 10));
		var temp;
	  // set callback handlers
	  client.onConnectionLost = onConnectionLost;
	  client.onMessageArrived = onMessageArrived;
	  var options = {
	    useSSL: true,
	    userName: "*****",
	    password: "*****",
	    onSuccess:onConnect,
	    onFailure:doFail
	  }
		

	  // connect the client
	  client.connect(options);

	  // called when the client connects
	  function onConnect() {
	    // Once a connection has been made, make a subscription and send a message.
	    console.log("onConnect");
	    //document.getElementById("tds").innerHTML = "Connected";
	    client.subscribe("/data");
	    client.subscribe("/temp");
	    message = new Paho.MQTT.Message("0");
	    message.destinationName = "/temp";
	    client.send(message);
		message2 = new Paho.MQTT.Message("1");
		message2.destinationName = "/temp";
		temp=message.payloadString;
		console.log("onConnection:"+temp);
	  }

	  function doFail(e){
	    console.log(e);
	  }

	  // called when the client loses its connection
	  function onConnectionLost(responseObject) {
	    if (responseObject.errorCode !== 0) {
	      console.log("onConnectionLost:"+responseObject.errorMessage);
	    }
	  }

	  // called when a message arrives
	  function onMessageArrived(message) {
		  
		var topic = message.destinationName;
		var n = topic.lastIndexOf('/');
		var result = topic.substring(n + 1);
		switch(result){
		  case "data":{
			console.log("onMessageArrived DATA :"+message.payloadString);
			var datamsg = message.payloadString;
			if(temp == '1')
			{
				window.location.href = "http://localhost/login-system/mqttmsg.php?javasmsg="+message.payloadString;
			}
			client.send(message2);
		  }
		  break;
		  case "temp":{
			console.log("onMessageArrived TEMP :"+message.payloadString);
			temp = message.payloadString;
		  }
		  break;
		  default:{
			alert("wrong topic");
		  }
		};
		  
	    /*console.log("onMessageArrived:"+message.payloadString);		
		var datamsg = message.payloadString;
		if(temp=='1')
		{
			window.location.href = "http://localhost/login-system/mqttmsg.php?javasmsg="+message.payloadString;
		}*/
		
		//client.send(message2);
	  }