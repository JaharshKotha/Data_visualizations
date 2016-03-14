// Bubble Chart Visualization
// The function is used to dynamically display the user
window.onload = function () {

	var id_selector = document.getElementById("text-select");
	id_selector.size = "1";
	var users = ["All users","A0001","A0005","A0008","A0009","A0010","A0011","A0014","A0015","A0018","A0019","A0020","A0021","A0022","A0024","A0025","A0026","A0029","A0030","A0033","A0034","A0037","A0039","A0040","A0041","A0042","A0043","A0044","A0046","A0047","A0048","A0049","A0050","A0052","A0054","A0056","A0057","A0059","A0061","A0064","A0065","A0066","A0067","A0069","A0071","A0073","A0074","A0075","A0077","A0080","A0081","A0082","A0084","A0087","A0088","B0005","B0007","B0009","B0012","B0013","B0018","B0020","B0021","B0024","B0025","B0026"] ;

	var user_1 ;
	var option_el;
	for(i in users) {
		option_el = document.createElement("option");
		option_el.setAttribute("value",users[i]);
		option_el.appendChild(document.createTextNode(users[i]));
		id_selector.appendChild(option_el);
	}
	//document.getElementById("title_user").innerHTML = "The most frequently used words by: "+document.getElementById("text-select").value;
}

function change_title() {
	//document.getElementById("title_user").innerHTML = "The most frequently used words by: "+document.getElementById("text-select").value;
}