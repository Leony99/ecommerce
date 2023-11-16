//Search-box transform
const body = document.querySelector("body");
const searchBox = document.querySelector(".menu .search-box");
const searchInput = document.querySelector(".search-input");
const searchButton = document.querySelector(".search-button");
const searchButtonImg = document.querySelector(".search-button img");

searchButton.addEventListener("click", function(event) {
    if (searchBox.classList.contains("search-box-closed")) {
        event.preventDefault();
        searchBox.classList.remove("search-box-closed");
        searchInput.classList.remove("search-input-closed");
        searchButton.classList.remove("search-button-closed");
        searchInput.focus();
    }
});

body.addEventListener("click", function(event) {
    if (event.target !== searchButtonImg
        && event.target !== searchButton
        && event.target !== searchInput
        && event.target !== searchBox) {
        searchBox.classList.add("search-box-closed");
        searchInput.classList.add("search-input-closed");
        searchButton.classList.add("search-button-closed");
    }
});