$(document).ready(() => {
    getFriends();
    resize();

    if (getUrlParameter('friend_id')) {
        $('#friend_info').removeClass('d-none');
        $('.text-bar').removeClass('d-none');

        $.ajax({
            contentType: 'application/json',
            data: JSON.stringify({
                "type": "user",
                "user_id": getUrlParameter('friend_id')
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                $('#friend_username').text(res.data[0].username);
                $('#friend_profile_photo').attr('src', res.data[0].profile_photo);
                setInterval(() => {
                    $.ajax({
                        contentType: 'application/json',
                        data: JSON.stringify({
                            "type": "get_messages",
                            "user_id": user_id,
                            "friend_id": getUrlParameter('friend_id')
                        }),
                        url: 'api.php',
                        type: 'POST',
                        success: (res) => {
                            $('.messages').html(res.data.map(message => {
                                if (message.user_id == user_id) {
                                    return myBubble(message);
                                }
                                else {
                                    return friendBubble(message);
                                }
                            }).join(''));
                        },
                        error: (res) => {
                            console.log(res);
                        },
                        processData: false,
                    })
                }, 500);
            },
            error: (res) => {
                console.log(res);
            },
            processData: false,
        })
    }
});

const getUrlParameter = (sParam) => {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

$(window).resize(() => {
    resize();
})

const resize = () => {
    let windowsize = $(window).width();

    if (windowsize < 1200) {
        $('.navtext-hide').css('display', 'none');
    }
    else {
        $('.navtext-hide').css('display', 'block');
    }

    if (windowsize < 769) {
        $('.mobile-hide').css('display', 'none');
        $('.mobile-show').css('display', 'block');
    }
    else {
        $('.mobile-hide').css('display', 'block');
        $('.mobile-show').css('display', 'none');
    }
}

const friendCard = ({username, user_id, profile_photo}) => `
    <div class="lighter-gray-2 p-3 rounded row mt-4 friend_card" id="${user_id}">
        <div class="col-3">
            <img src="${profile_photo}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9">
            <div>
                <h4 class="text-white fw-bold mb-0">${username}</h4>
            </div>
            <p class="text-white mt-2 last-message"></p>
        </div>
    </div>
`;

const friendBubble = ({message, time}) => `
    <div class="mb-3">
        <div class="friend-message text-white p-3 rounded-3 bg-primary mb-1 me-5">
            <p class="mb-0">${message}</p>
        </div>
        <small class="text-white">${time.slice(0,-3)}</small>
    </div>
`;

const myBubble = ({message, time}) => `
    <div class="mb-3 d-flex flex-column align-items-end w-100">
        <div class="my-message text-white p-3 rounded-3 lighter-gray-2 align-self-end mb-1 ms-5">
            <p class="mb-0">${message}</p>
        </div>
        <small class="text-white">${time.slice(0,-3)}</small>
    </div>
`;

const getFriends = () => {
    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "get_friends",
            "user_id": user_id
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            console.log(res);
            $('.friends').html(res.data.map(friendCard).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$('.friends').on('click', '.friend_card', function() {
    let friend_id = $(this).attr('id');
    window.location.href = `messages.php?friend_id=${friend_id}`;
});

$('.text-bar button').on('click', () => {
    let message = $('.text-bar input').val();
    let time = new Date().toLocaleTimeString();
    let hours = time.split(':')[0];
    let minutes = time.split(':')[1];
    let seconds = time.split(':')[2].split(' ')[0];
    let am_pm = time.split(':')[2].split(' ')[1];
    if (am_pm == 'PM') {
        hours = parseInt(hours) + 12;
    }
    time = `${hours}:${minutes}:${seconds}`;
    $('.text-bar input').val('');
    $('.messages').append(myBubble({message, time}));
    $('.messages').scrollTop($('.messages')[0].scrollHeight);

    $.ajax({
        contentType: 'application/json',
        data: JSON.stringify({
            "type": "send_message",
            "user_id": user_id,
            "friend_id": getUrlParameter('friend_id'),
            "message": message,
            "time": time
        }),
        url: 'api.php',
        type: 'POST',
        success: (res) => {
            console.log(res);
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
});