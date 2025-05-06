
var btnToggle = document.querySelector('#btn-tgg');
var cntLef = document.querySelector('.cnt-esc-lef');


btnToggle.addEventListener('click', function() {
    cntLef.classList.add('opencnt');
    btnToggle.style.display = 'none';

    cntLef.addEventListener('click', function(e) {
        if(e.target.id == 'fecharcnt'){
            cntLef.classList.remove('opencnt');
            btnToggle.style.display = 'block';
        }
    });
});





//Posts Status
function search_user() {
    var find = document.querySelector('#find-friend').value;

    if (find.length >= 1) {//Faz Busca quando tiver um caracter ou mais
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "user/find_new.php?find=" + find, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.querySelector('#result_find').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    } else {
        document.querySelector('#result_find').innerHTML = '';
    }
}


function openReplyModal(commentId, username) {
    alert('wait')
    // document.getElementById('parent_id').value = commentId;
    // document.getElementById('reply_to_username').innerText = username;
    // document.getElementById('replyModal').style.display = "block";
    }

    function closeReplyModal() {
        document.getElementById('replyModal').style.display = "none";
    }

        function likeComment(commentId) {
            fetch('?pagesCenter=like_comment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'comment_id=' + commentId
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                // Atualize a interface do usuário conforme necessário
            });
        }

        function shareComment(commentId) {
            fetch('?pagesCenter=share_comment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'comment_id=' + commentId
            })
            .then(response => response.text())
            .then(data => {
                console.log(data);
                // Atualize a interface do usuário conforme necessário
            });
        }
