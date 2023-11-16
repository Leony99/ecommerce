//Recover search box data
function getParameterFromUrl(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}
var search = getParameterFromUrl('search');

alert('Data received: ' + search);

//Catalog filter
const checkboxes = document.querySelectorAll("input[type=checkbox]");
const products = document.querySelectorAll(".product-card");

checkboxes.forEach(checkbox => {
    checkbox.addEventListener("change", function() {
        const checkedCheckboxes = document.querySelectorAll("input[type=checkbox]:checked");
        const checkedValues = [];
        checkedCheckboxes.forEach(checkbox => {
            checkedValues.push(checkbox.value);
        });

        if(checkedValues.length > 0) {
            products.forEach(product => {
                const classList = product.className.split(" ");

                if(checkedValues.includes(classList[1])) {
                    product.style.display = "flex";
                }
                else {
                    product.style.display = "none";
                }
            });
        }
        else {
            products.forEach(product => {
                product.style.display = "flex";
            });
        }
    });
});

//Redirect to product.html
function redirectToProductPage(clickedDiv) {
    var image = clickedDiv.getAttribute("data-image");
    var name = clickedDiv.getAttribute("data-name");
    var price = clickedDiv.getAttribute("data-price");

    var url = 'product.html?image=' + encodeURIComponent(image) +
                '&name=' + encodeURIComponent(name) +
                '&price=' + encodeURIComponent(price);

    window.location.href = url;
}