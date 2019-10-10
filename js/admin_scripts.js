
document.addEventListener("DOMContentLoaded", () => {

    const aDeletePost = document.querySelectorAll("#aDeletePost");

    for(let i = 0; i < aDeletePost.length; i++) {

        aDeletePost[i].addEventListener("click", () => {

            let deletePost = aDeletePost[i].parentNode.parentNode.dataset.post_id;

            let confirmm = confirm("Quer mesmo apagar?");
                
                if(confirmm){
                    fetch("./delete_post/"+deletePost, {
                        method: "DELETE", 
                        mode: "same-origin", 
                        cache: "no-cache",
                        credentials: "same-origin", 
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        redirect: "follow", 
                        referrer: "no-referrer", 
                        body: "",
                    })
                    .then(response => response.json())

                    aDeletePost[i].parentNode.parentNode.style.display = "none";

                }

        });
    }

    const aDeleteProfile = document.querySelectorAll("#aDeleteProfile");

    for(let i = 0; i < aDeleteProfile.length; i++) {

        aDeleteProfile[i].addEventListener("click", () => {

            let deleteProfile = aDeleteProfile[i].parentNode.parentNode.firstElementChild.textContent;

            let confirmm = confirm("Quer mesmo apagar?");
                
                if(confirmm){
                    fetch("./delete_profile/"+deleteProfile, {
                        method: "DELETE", 
                        mode: "same-origin", 
                        cache: "no-cache",
                        credentials: "same-origin", 
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded",
                        },
                        redirect: "follow", 
                        referrer: "no-referrer", 
                        body: "",
                    })
                    .then(response => response.json())

                    aDeleteProfile[i].parentNode.parentNode.style.display = "none";

                }

        });
    }

    const aDeleteComment = document.querySelectorAll("#aDeleteComment");

    for(let i = 0; i < aDeleteComment.length; i++) {

        aDeleteComment[i].addEventListener("click", () => {
            let deleteComment = aDeleteComment[i].parentNode.parentNode.dataset.comment_id;
            console.log(deleteComment);

            let confirmm = confirm("Quer mesmo apagar?");
                
            if(confirmm){
                fetch("../delete_comment/"+deleteComment, {
                    method: "DELETE", 
                    mode: "same-origin", 
                    cache: "no-cache",
                    credentials: "same-origin", 
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    redirect: "follow", 
                    referrer: "no-referrer", 
                    body: "",
                })
                .then(response => response.json())

                aDeleteComment[i].parentNode.parentNode.style.display = "none";

            }

        });
    }

});
