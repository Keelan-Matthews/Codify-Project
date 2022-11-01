$(document).ready(() => {
    getFriends();
    resize();

    if (getUrlParameter('friend_id')) {
        $.ajax({
            contentType: 'application/json',
            data: JSON.stringify({
                "type": "mark_read",
                "user_id": user_id,
                "friend_id": getUrlParameter('friend_id')
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                console.log(res);
            },
            error: (res) => {
                console.log(res);
            }
        })

        if ($(window).width() < 769) {
            $('#friend-list').addClass('d-none');
        }
        else {
            $('#friend-list').removeClass('d-none');
        }
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
                            if (res.data.length > 0) {
                                $('.messages').html(res.data.map(message => {
                                    if (message.user_id == user_id) {
                                        return myBubble(message);
                                    }
                                    else {
                                        return friendBubble(message);
                                    }
                                }).join(''));
                            }
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

const friendCard = ({ username, user_id, profile_photo }) => `
    <div class="border-bottom border-4 border-color-2 p-3 rounded row mt-4 friend_card" id="${user_id}">
        <div class="col-3 col-md-12 col-xl-3">
            <img src="${profile_photo}" alt="" class="rounded-circle w-100">
        </div>
        <div class="col-9 d-block d-md-none d-xl-block">
            <h4 class="text-white fw-bold mb-0">${username}</h4>
            <p class="text-white mt-2 last-message">${getLastMessage(user_id)}</p>
        </div>
    </div>
`;

const friendBubble = ({ message, time }) => `
    <div class="mb-3">
        <div class="text-white p-3 rounded-3 bg-primary mb-1 me-5">
            <p class="mb-0 text-wrap">${message}</p>
        </div>
        <small class="text-white">${transformTime(time)}</small>
    </div>
`;

const myBubble = ({ message, time }) => `
    <div class="mb-3 d-flex flex-column align-items-end">
        <div class="text-white p-3 rounded-3 lighter-gray-2 align-self-end mb-1 ms-5">
            <p class="mb-0 text-wrap">${message}</p>
        </div>
        <small class="text-white">${transformTime(time)}</small>
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
            $('.friends').html(res.data.map(friendCard).join(''));
        },
        error: (res) => {
            console.log(res);
        },
        processData: false,
    })
}

$('.friends').on('click', '.friend_card', function () {
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

    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth() + 1;
    let day = date.getDate();

    time = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

    $('.text-bar input').val('');
    $('.messages').append(myBubble({ message, time }));
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

const transformTime = (time) => {
    let hours = time.split(' ')[1].split(':')[0];
    let minutes = time.split(' ')[1].split(':')[1];
    let seconds = time.split(' ')[1].split(':')[2];
    let date = time.split(' ')[0].split('-');
    let year = date[0];
    let month = date[1];
    let day = date[2];

    let today = new Date();
    let yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);

    if (today.getFullYear() == year && today.getMonth() + 1 == month && today.getDate() == day) {
        return `Today at ${hours}:${minutes}`;
    }
    else if (yesterday.getFullYear() == year && yesterday.getMonth() + 1 == month && yesterday.getDate() == day) {
        return `Yesterday at ${hours}:${minutes}`;
    }
    else {
        return `${month}/${day} at ${hours}:${minutes}`;
    }
}

const getLastMessage = (friend_id) => {
    let lastMessageArray = [];
    const result = new Promise((resolve, reject) => {
        $.ajax({
            async: false,
            contentType: 'application/json',
            data: JSON.stringify({
                "type": "get_messages",
                "user_id": user_id,
                "friend_id": friend_id
            }),
            url: 'api.php',
            type: 'POST',
            success: (res) => {
                if (res.data.message)
                    lastMessageArray.push("");
                else {
                    let lastMessage = res.data[res.data.length - 1];
                    if (parseInt(lastMessage.user_id) == user_id) {
                        let concat = lastMessage.message.length > 30 ? lastMessage.message.substring(0, 20) + "..." : lastMessage.message;
                        lastMessageArray.push("You: " + concat);
                    }
                    else {
                        lastMessageArray.push(lastMessage.message.length > 30 ? lastMessage.message.substring(0, 25) + "..." : lastMessage.message);
                    }
                }
                resolve(lastMessageArray);
            },
            error: (res) => {
                console.log(res);
                reject(res);
            },
            processData: false,
        })
    });

    result.then((res) => {
        $('.friends').find(`#${friend_id} .last-message`).html(res[res.length - 1]);
    })
}