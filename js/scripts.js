document.addEventListener("DOMContentLoaded", () =>{

    const buttonDelete = document.querySelector("#deleteB");
    const editButton = document.querySelectorAll("#editButton");
    const cancelButton = document.querySelector("#cancelButton");
    const confirmButton = document.querySelector("#confirmButton");
    const modal = document.getElementById("modal");

    function deleteConfirm() {
        let confirmm = confirm("Quer mesmo apagar?");

        if(confirmm){
           
            fetch("../delete_post/"+buttonDelete.value, {
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
            .then(response => response.json()).then(
                redirect => {
                    window.location.replace("http://localhost/PF/Project/create/profile");
                }
            ) 
        }
    }

    buttonDelete.addEventListener("click", () => {
        
        deleteConfirm();
    });
    
    cancelButton.addEventListener("click", (e) => {
        modal.style.display = "none";
        window.location.reload();
        
    });
    
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    
    let newComment = document.querySelector("#new-comment");
    
    for(let i = 0; i< editButton.length; i++) {
        
        editButton[i].addEventListener("click", () => {
            modal.style.display = "block";
            
            let oldComment = editButton[i].parentNode.previousElementSibling.lastElementChild;
            let commentID = editButton[i].parentNode.previousElementSibling.dataset.comment_id;
            newComment.value = oldComment.textContent;
            
            confirmButton.addEventListener("click", () => {
                
                let finalComment = newComment.value;
                
                fetch("../edit_comment/"+commentID+"/"+finalComment, {
                    method: "POST", 
                    mode: "same-origin", 
                    cache: "no-cache",
                    credentials: "same-origin", 
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                    redirect: "follow", 
                    referrer: "no-referrer", 
                    body: "comment_id="+commentID+"&message="+finalComment+"",
                })
                .then(response => response.json() )
                
                modal.style.display = "none";
               
            });
        });
    }

    const deleteComment = document.querySelectorAll("#deleteComment");
    
    function deleteCommentConfirm(deleteCommentField) {
        let confirmm = confirm("Quer mesmo apagar?");
        
        if(confirmm){
            
            fetch("../delete_comment/"+deleteCommentField, {
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
            .then(response => response.json()).then(
                
                    // window.location.reload() 
            ) 
        }
    }

    for(let i = 0; i < deleteComment.length; i++){
        
        deleteComment[i].addEventListener("click", () => {
            
            let deleteCommentField = deleteComment[i].parentNode.previousElementSibling.dataset.comment_id;

            deleteCommentConfirm(deleteCommentField);

        });
    }





 
});