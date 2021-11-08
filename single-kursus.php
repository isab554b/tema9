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
		<div class="heroimage_single">
		 <h1 class="titel">Kurser & workshops</h1>
		 </div>
		<button onclick="goBack()">Tilbage</button>
		<section class="kursus_forms_container">
		<article class="single_kursus">
             <h2 class="text"></h2>
                <img class="image_single" src="" alt="">
				<div class="flex_single">
                <p class="fag"></p>
				</div>
				<p class="lang_beskrivelse"></p>
				<p class="klassetrin"></p>
				<p class="antal_deltagere"></p>
				<p class="varighed"></p>
                <p class="pris"></p>
            </article>
    
		<section class="bookingfunktion">
	<h2>Book kursus eller workshop nu</h2>
<form action="booking" method="post">
  <div class="elem-group">
    <label for="navn">Navn</label>
    <input type="text" id="name" required>
  </div>
  <div class="elem-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" required>
  </div>
  <div class="elem-group">
    <label for="telefonnumer">Telefonnummer</label>
    <input type="tel" id="phone" required>
  </div>
 
  <div class="elem-group inlined">
    <label for="lærere">Antal lærere</label>
    <input type="number" id="lærere" min="1" required>
  </div>
  <div class="elem-group inlined">
    <label for="elever">Antal elever</label>
    <input type="number" id="elever" min="1" required>
  </div>
  <div class="elem-group inlined">
    <label for="checkin-date">Klassetrin</label>
    <input type="number" id="klassetrin" required>
  </div>
  <div class="elem-group inlined">
    <label for="checkout-date">Dato</label>
    <input type="date" id="dato" required>
  </div>

      <div class="button-group">
        <button class="button_form" type="book">Book nu</button>
      </div>
    </form>
	</section>
	</section>

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
 	document.querySelector(".image_single").src = kursus.billede.guid;
	document.querySelector(".lang_beskrivelse").textContent = kursus.lang_beskrivelse;
    document.querySelector(".fag").textContent = kursus.fag;
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
