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

	<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<button onclick="goBack()">Tilbage</button>
		<article>
             <h2 class="text"></h2>
                <img class="image" src="" alt="">
				<p class="lang_beskrivelse"></p>
                <p class="fag"></p>
				<p class="klassetrin"></p>
				<p class="antal_deltagere"></p>
				<p class="varighed"></p>
                <p class="pris"></p>
            </article>
        

		</main>
 <script>
    let kursus;
    const dbUrl = "https://isahilarius.dk/kea/09_cms/ungdomsbyen/wp-json/wp/v2/kursus/"+<?php echo get_the_ID() ?>;
     

    async function getJson() {
        const data = await fetch(dbUrl);
        kursus = await data.json();
        visKurser();
    }

    function visKurser() {
	document.querySelector(".text").textContent = kursus.title.rendered;
 	document.querySelector(".image").src = kursus.billede.guid;
	document.querySelector(".lang_beskrivelse").textContent = kursus.lang_beskrivelse;
    document.querySelector(".fag").textContent = `Fag: ${kursus.fag}`;
	document.querySelector(".klassetrin").textContent = `Klassetrin: ${kursus.klassetrin}`;
	document.querySelector(".antal_deltagere").textContent = `Antal deltagere: ${kursus.antal_deltagere}`;
	document.querySelector(".varighed").textContent = `Varighed: ${kursus.varighed}`;
    document.querySelector(".pris").textContent = `Pris: ${kursus.pris}`;
	
} 

function goBack() {
  window.history.back();
}
    getJson();

</script>

</div>

<?php get_footer();
