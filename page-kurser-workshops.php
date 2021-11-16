<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gutener
 */

get_header();
?>
		<template>
  			<article class="kursus">
                <h2></h2>
                <img class="image_loop"src="" alt="">
				<!-- <p class="beskrivelse"></p> -->
				<div class="flex">
                <p class="fag"></p>
				</div>
				<p class="klassetrin"></p>
				<p class="antal_deltagere"></p>
				<p class="varighed"></p>
                <p class="pris"></p>
        	</article>
        </template>

	


	<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<div class="heroimage">
		 <h1 class="titel">Kurser & workshops</h1>
		 </div>
		
        <nav id="filtrering">
			 <button id="menuknap">☰
			 <ul id="menu" class="hidden">
				 <li><button data-kursus="alle" >Alle</button></li>
			 </ul>
			 </button>
		</nav>
		
        <section class="kursuscontainer">
        </section>
        </main>
 <script>


// lytter efter når siden er loaded
window.addEventListener("load", sidenVises);

// når siden er loaded viser den menuknappen og gør den klikbar
function sidenVises() {
console.log("sidenVises");
document
.querySelector("#menuknap")
.addEventListener("click", toggleMenu);
}

// når man klikker på menuknap lytter den efter funktionen toggle
function toggleMenu() {
console.log("toggleMenu");

// toggle = når toggle er aktiv og der trykkes på menuknappen bliver .hidden aktiveret på #menu og den "forsvinder",
// og hvis .hidden er på #menu når der trykkes på menuknappen bliver den vist igen da .hidden fjernes
document.querySelector("#menu").classList.toggle("hidden");
let erSkjult = document
.querySelector("#menu")
.classList.contains("hidden");

// hvis det er sandt at .hidden er aktiv vises "☰" og hvis .hidden ikke er aktiv og menuen bliver set vises "x".
if (erSkjult == true) {
document.querySelector("#menuknap").textContent = "☰";
} else {
document.querySelector("#menuknap").textContent = "x";
}
}

     let kurser;
	 let categories;
	 

    const dbUrl = "https://isahilarius.dk/kea/09_cms/ungdomsbyen/wp-json/wp/v2/kursus?per_page=100";
	const catUrl = "https://isahilarius.dk/kea/09_cms/ungdomsbyen/wp-json/wp/v2/categories?slug=efterskoler,grundskoler,kommuner,undervisere-ledere,ungdomsuddannelser,online-kurser-workshops";
     

    async function getJson() {
        const data = await fetch(dbUrl);
		const catdata = await fetch(catUrl);
        kurser = await data.json();
		categories = await catdata.json();
        console.log(categories);
        visKurser();
		opretKnapper();
    }

	function opretKnapper() {
		categories.forEach(cat =>{ 
		document.querySelector("#menu").innerHTML += `<button class="filter" data-kursus="${cat.id}">${cat.name}</button>`
		})
		addEventListenersToButtons();
	}

	function addEventListenersToButtons() {
	document.querySelectorAll("#menu button").forEach(elm =>{
		elm.addEventListener("click", filtrering);
	})
	}

	let filterKursus = "alle";
	
	function filtrering(){
		filterKursus = this.dataset.kursus;
		console.log(filterKursus);

		visKurser();
	}

    function visKurser() {
    let temp = document.querySelector("template");
    let container = document.querySelector(".kursuscontainer");
	container.innerHTML = "";
    kurser.forEach(kursus => {
		if (filterKursus == "alle" || kursus.categories.includes(parseInt(filterKursus))){
    let klon = temp.cloneNode(true).content;
    klon.querySelector("h2").textContent = kursus.title.rendered;
 	klon.querySelector(".image_loop").src = kursus.billede.guid;
    klon.querySelector(".fag").textContent = kursus.fag;
	klon.querySelector(".klassetrin").textContent = `Klassetrin: ${kursus.klassetrin}`;
	klon.querySelector(".antal_deltagere").textContent = `Antal deltagere: ${kursus.antal_deltagere}`;
	klon.querySelector(".varighed").textContent = `Varighed: ${kursus.varighed}`;
    klon.querySelector(".pris").textContent = `Pris: ${kursus.pris}`;
    klon.querySelector("article").addEventListener("click", ()=> {location.href = kursus.link;})
    container.appendChild(klon);
	}
	})  
    }

    getJson();

</script>
		
</div>
<?php get_footer();
