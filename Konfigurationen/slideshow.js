
// Initialisiere slideIndex mit 1
let slideIndex = 1;

// Rufe die showSlides-Funktion auf, um die erste Folie anzuzeigen
showSlides(slideIndex);

// Funktion, um zur nächsten oder vorherigen Folie zu wechseln
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Funktion, um zu einer bestimmten Folie zu wechseln
function currentSlide(n) {
  showSlides(slideIndex = n);
}

// Funktion, um die Folien anzuzeigen
function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides"); // Alle Elemente mit der Klasse "mySlides" abrufen
  let dots = document.getElementsByClassName("dot"); // Alle Elemente mit der Klasse "dot" abrufen
  
  // slideIndex zurücksetzen, wenn er die Anzahl der Folien überschreitet
  if (n > slides.length) {
    slideIndex = 1;
  }    
  
  // slideIndex zurücksetzen, wenn er kleiner als 1 ist
  if (n < 1) {
    slideIndex = slides.length;
  }
  
  // Alle Folien ausblenden
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  
  // "active" Klasse von allen Punkten entfernen
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  
  // Aktuelle Folie anzeigen und "active" Klasse zum entsprechenden Punkt hinzufügen
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
