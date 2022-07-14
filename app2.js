var server = require('ws').Server;
var fs = require('fs');

var CSVToJSON = require('csvtojson');

var s = new server({port: 5002});


s.on('connection', function (ws) {
    try 
    {
    	
        const capteurs = ['LM393.csv', 'pT100.csv', 'LM200.csv'];


        capteurs.forEach(element => {
        	//ws.send(JSON.stringify(element));
			 CSVToJSON().fromFile(element).then( data => {
				let i = 0;
				setInterval(function() { 
					if (i < data.length) {
						var formatedKey = element.replace('.csv', '');
						item = {};
                        item[formatedKey] = data[i];
						ws.send(JSON.stringify([item]));
						i = i + 1;
					}
				}, 1000);
			 });
		});
        

    } catch (e) {
        console.log(e);
    }
});


