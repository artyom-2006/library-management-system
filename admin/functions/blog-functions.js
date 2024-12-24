export function storePostsInTable(posts) {
    const postsTableBody = document.querySelector("#posts-table .post-body");
    const postProperties = ["post_id", "title", "description", "created_at"];

    posts.forEach((post) => {
        const row = document.createElement("tr");

        for(let i = 0; i < 4; i++) {
            let cell = document.createElement("td");
            cell.innerText = post[postProperties[i]];
            if(i === 2) {
                cell.classList.add("description");
            }
            row.append(cell);
        }

        const editButtonCell = document.createElement("td");
        editButtonCell.classList.add("button-cell");
        const editButton = document.createElement("button");
        editButton.innerText = "Խմբագրել";
        editButton.classList.add("edit-button");
        //editButton.addEventListener("click", () => editEbook(ebook.ebook_id));
        editButtonCell.append(editButton);

        const deleteButtonCell = document.createElement("td");
        deleteButtonCell.classList.add("button-cell");
        const deleteButton = document.createElement("button");
        deleteButton.innerText = "Ջնջել";
        deleteButton.classList.add("delete-button");
        //deleteButton.addEventListener("click", () => deleteEbook(ebook.ebook_id, row));
        deleteButtonCell.append(deleteButton);

        row.append(editButtonCell, deleteButtonCell);

        postsTableBody.append(row);
    });    
}