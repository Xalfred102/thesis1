// Dummy data for tenant's booked rooms (replace with actual data from your server)
const tenantRoomsData = [
    { 
        roomNumber: 51,
        checkInDate: '2023-03-15',
        checkOutDate: '2023-03-30',
        status: 'Occupied',
        tenant: { name: 'alfred', contact: 'alfred@gmail.com' }
    },
    { 
        roomNumber: 10,
        checkInDate: '2023-04-01',
        checkOutDate: '2023-04-15',
        status: 'Reserved',
        tenant: { name: 'alfred', contact: 'alfredmagaso7@gmail.com' }
    },
    // Add more tenant room data as needed
];

// Function to generate table rows for tenant's booked rooms
function generateTenantRoomRows() {
    const tenantTableBody = document.getElementById('tenantTableBody');

    tenantRoomsData.forEach(room => {
        const rowHtml = `
            <tr>
                <td>${room.roomNumber}</td>
                <td>${room.checkInDate}</td>
                <td>${room.checkOutDate}</td>
                <td>${room.status}</td>
                <td>${room.tenant.name}</td>
                <td>${room.tenant.contact}</td>
            </tr>
        `;
        tenantTableBody.innerHTML += rowHtml;
    });
}

// Call the function to generate tenant room rows on page load
generateTenantRoomRows();
