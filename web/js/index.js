/*
 * This function toggles the hamburger menu
 */
function toggleHam() {
    document.getElementsByClassName("navigation")[0].classList.toggle("responsive");
}

/*
 *  This function updates the number after the slider bar of a range selector.
 *  Used on the Storm Center Reporting Page
 */
function adjustRating(rating) {
    document.getElementById("ratingvalue").innerHTML = rating;
}