const searchInput = document.querySelector("#search-input");
const offerWrapper = document.querySelector(".offer-wrapper");

searchInput.addEventListener("keyup", async function() {
    try {
        const response = await fetch("search?searchItem=" + searchInput.value);
        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        const data = await response.json();
        console.log("Received data:", data);

        if (data.length > 0) {
            offerWrapper.innerHTML = '';
            data.forEach(offer => {
                offerWrapper.insertAdjacentHTML("beforeend", generateHTML(offer));
            });
        } else {
            offerWrapper.innerHTML = 'No results found.';
        }
    } catch (error) {
        console.error('Fetch error:', error);
    }
});

function generateHTML(offer) {

    return ` <div class="col-lg-4 col-md-6 mb-4">
    <div class="card">
        <img src="${offer.imageUrl}" alt="Company Image" style="height: 250px;">
        <div class="card-body">
            <h5 class="card-title">${offer.title}</h5>
            <p class="card-text">${offer.description}</p>
        </div>
        <div class="mx-2">
            <lord-icon
                src="https://cdn.lordicon.com/ppyvfomi.json"
                trigger="hover"
                colors="primary:#545454"
                style="width:20px;height:20px">
            </lord-icon>
            <a href="#" class="" style="text-decoration:none">${offer.company.name}</a>
        </div>
        <div class="mx-2">
            <lord-icon
                src="https://cdn.lordicon.com/surcxhka.json"
                trigger="hover"
                colors="primary:#545454,secondary:#3080e8"
                style="width:20px;height:20px">
            </lord-icon>
            <a href="#" class="" style="text-decoration:none">${offer.city.name}</a>
        </div>
        <div class="card-body">
            <a href="${offer.offerUrl}" class="btn btn-outline-success btn-sm">Read More</a>
            <span class="bg-warning text-white badge py-2 px-3">${offer.created_at}</span>
        </div>
    </div>
</div>`;
}

