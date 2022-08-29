let events = {
    "events": [
        {
            "title": "Ludum Dare 2022",
            "date": "2020-05-01",
            "location": "Cape Town",
            "img": "media/test.jpg",
            "profile": "media/profile.jpg"
        },
        {
            "title": "Ludum Dare 2021",
            "date": "2020-04-01",
            "location": "Cape Town",
            "img": "media/test.jpg",
            "profile": "media/profile.jpg"
        },
        {
            "title": "Ludum Dare 2020",
            "date": "2020-03-01",
            "location": "Cape Town",
            "img": "media/test.jpg",
            "profile": "media/profile.jpg"
        }
    ]
}

const Event = ({ title, date, location, img, profile }) => `
  <div class="card lighter-gray shadow rounded event-card ">
    <div class="d-flex p-3">
        <img src="${profile}" class="rounded-circle me-3" width="50" height="50">
        <div class="text-white">
            <h5 class="my-0">${title}</h5>
            <small>${location}</small>
        </div>
    </div>
    <img src="${img}" alt="${title}" class="my-2 w-100">
    <small class="text-white text-end my-3 me-3"><i class="fas fa-clock me-2"></i>${date}</small>
    
  </div>
`;

const populateHomeEvents = () => {
    $('.events').html(events.events.map(Event).join(''));
}

$(document).ready(function () {
    populateHomeEvents();
});

let windowsize = $(window).width();

if (windowsize < 769) {
    $('.mobile-hide').css('display', 'none');
    $('.mobile-show').css('display', 'block');
}
else {
    $('.mobile-hide').css('display', 'block');
    $('.mobile-show').css('display', 'none');
}