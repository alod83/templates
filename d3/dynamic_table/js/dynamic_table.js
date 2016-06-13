
var thead_data = ["id", "author", "book"];

var tbody_data = [	
                   [1,"Manzoni","I promessi Sposi"],
                   [2,"Alighieri","La Divina Commedia"],
                   [3,"Ariosto",	"Orlando Furioso"],
                   [4,"Tasso","Gerusalemme Liberata"]];

// build the header
d3.select("#dth").append('tr').selectAll('td')
	.data(thead_data)
	.enter()
	.append('td')
	.text(function (c) { return c; });

// build a row for each record
var rows = d3.select("#dtb")
	.selectAll('tr')
	.data(tbody_data).enter().append('tr');

//create records for each row
rows.selectAll('td')
	.data(function(row){
		return row.map(function(element){
			return element;
		});
	})
  	.enter()
  	.append('td')
  	.text(function (d) { return d; });

// style the table
//rows.style("background-color", "red");


