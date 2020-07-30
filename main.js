let id = $("input[name*='Pet_ID']")
id.attr("readonly","readonly");
$(".btnedit").click(e=>{
	
 let textvalues=displayData(e);
		
	let p_name = $("input[name*='name']");
	let p_image = $("input[name*='image']");
	//let p_age = $("input[name*='age']");
	let p_shortd = $("input[name*='description']");
	let p_type = $("input[name*='type']");
	let p_address = $("input[name*='address']");
	let p_zipcode = $("input[name*='zip_code']");
	let p_city = $("input[name*='city']");
	let p_hobbies= $("input[name*='hobbies']");
	let p_price = $("input[name*='price']");

	id.val(textvalues[0]);
	p_name.val(textvalues[1]);
	p_image.val(textvalues[2]);
	//p_age.val(textvalues[3]);
	p_shortd.val(textvalues[4]);
	p_type.val(textvalues[5]);
	p_address.val(textvalues[6]);
	p_zipcode.val(textvalues[7]);
	p_city.val(textvalues[8]);
	p_hobbies.val(textvalues[9]);
	p_price.val(textvalues[10]);
	console.log(p_name);
console.log(p_image);

});

function displayData(e) {
	
	let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];

    for (const value of td){
       if(value.dataset.id==e.target.dataset.id){
       	

       	textvalues[id++]=value.innerHTML.replace("<img id=\"img-admin\" src=\"","").replace("\">","");

       }
 
	}
	console.log(textvalues);
	return textvalues;
}