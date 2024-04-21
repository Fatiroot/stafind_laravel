        document.addEventListener('DOMContentLoaded', async function() {
            var searchInput = document.getElementById('search-city');

            var eventsList = document.getElementById('offre-list');
            var eventsList1 = document.getElementById('offre-listt');

            searchInput.addEventListener('input', async function() {
                var query = this.value;

                try {
                    const response = await fetch(`/searchByCity?query=${query}`);

                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    const data = await response.json();
                    console.log(data);

                    eventsList1.style.display = 'none';
                    eventsList.innerHTML = '';

                    data.forEach(offer => {
                        const eventCard = `
                        <div class="col-lg-4 col-md-6 mb-4">
                                <div class="card">
                                    <img src="${offer.imageUrl}" alt=""
                                        style="height: 250px">
                                    <div class="card-body">
                                        <h5 class="card-title">${offer.title}</h5>
                                        <p class="card-text">
                                        ${offer.description}
                                        </p>
                                    </div>
                                    <div class="mx-2">
                                        <lord-icon src="https://cdn.lordicon.com/ppyvfomi.json" trigger="hover"
                                            colors="primary:#545454" style="width:20px;height:20px">
                                        </lord-icon>
                                        <a href="#" class=""
                                            style=" text-decoration:none">${offer.company}</a>
                                    </div>
                                    <div class="mx-2">
                                        <lord-icon src="https://cdn.lordicon.com/surcxhka.json" trigger="hover"
                                            colors="primary:#545454,secondary:#3080e8" style="width:20px;height:20px">
                                        </lord-icon>
                                        <a href="#" class=""
                                            style=" text-decoration:none">${offer.city}</a>
                                    </div>
                                    <div class="card-body ">
                                        <a href=""
                                            class="btn btn-outline-success btn-sm">Read More</a>
                                        <span
                                            class="bg-warning text-white badge py-2 px-3">${offer.created_at}</span>
                                    </div>
                                </div>
                            </div>`;
                        eventsList.insertAdjacentHTML('beforeend', eventCard);
                    });
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        });

        //filter
        function filterByCategory(categoryId) {
            var events = document.querySelectorAll('.gallery-item');

            events.forEach(function(event) {
                var eventCategory = event.getAttribute('data-category');

                if (!categoryId || eventCategory == categoryId) {
                    event.style.display = 'block';
                } else {
                    event.style.display = 'none';
                }
            });
        }

