
function filterByDomain(domainId) {
    var offers = document.querySelectorAll('.gallery-item');

    offers.forEach(function(event) {
        var offerDomain= event.getAttribute('data-category');

        if (!domainId || offerDomain== domainId) {
            event.style.display = 'block';
        } else {
            event.style.display = 'none';
        }
    });
}

