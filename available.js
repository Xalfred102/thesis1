const availableRoomsData = [
    { 
        roomNumber: 51,
        availability: 'Available',
        images: [
            'path/to/image1.jpg',
            'path/to/image2.jpg',
            'path/to/image3.jpg',
        ],
    },
    // Add more room data as needed
];

function generateRoomCards() {
    const availableRoomsContainer = document.getElementById('availableRooms');

    availableRoomsData.forEach(room => {
        const cardHtml = `
            <div class="col-md-6 col-lg-4" style="padding: 10px; ">
                <a href="room-details.html?roomNumber=${room.roomNumber}" style="text-decoration: none; color: inherit;">
                    <div class="card available">
                        <div id="carouselExample${room.roomNumber}" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                ${generateCarouselItems(room.images)}
                            </div>
                            <a class="carousel-control-prev" href="#carouselExample${room.roomNumber}" role="button" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExample${room.roomNumber}" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Room ${room.roomNumber}</h5>
                            <div class="availability">${room.availability}</div>
                        </div>
                    </div>
                </a>
            </div>
        `;
        availableRoomsContainer.innerHTML += cardHtml;
    });
}

function generateCarouselItems(images) {
    return images.map((image, index) => `
        <div class="carousel-item ${index === 0 ? 'active' : ''}">
            <img src="${image}" class="d-block w-100" alt="Room Image">
        </div>
    `).join('');
}

// Call the function to generate room cards on page load
generateRoomCards();
