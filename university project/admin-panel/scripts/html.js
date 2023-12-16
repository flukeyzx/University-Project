import { animation } from "./dom.js"

const mainSection = document.querySelector('.main'); 





export function programHTML(){
    mainSection.innerHTML = 
    `
    <div class="training-section">
        <h1>Create Training Program</h1>
        <div class="form-container">
            <form action="" method="" class="training-form">
                <label>Name</label>
                <input type="text" name="name" required>
                <label>Description</label>
                <textarea cols="40" rows="6"></textarea>
                <label>Trainer</label>
                <select name="trainer">
                    <option disabled selected>Select trainer</option>
                    <option>Dr.Amir</option>
                    <option>Dr.Israr</option>
                    <option>Dr.Nadeem</option>
                </select>
                <label>Status</label>
                <select name="status">
                    <option>Active</option>
                    <option>Closed</option>
                </select>
                <label>Start Date</label>
                <input type="date" name="start" class="start" required>
                <label>End Date</label>
                <input type="date" name="end" class="end" required>

                <button type="submit" name="submit">Create</button>
            </form>
        </div>
        <button class="view-btn">View programs</button>
    </div> 
    
    
    `
}

export function projectHTML(){
    mainSection.innerHTML = 
    `
    <div class="training-section">
        <h1>Create Project</h1>
        <div class="form-container">
            <form action="" method="" class="training-form">
                <label>Name</label>
                <input type="text" name="name" required>
                <label>Description</label>
                <textarea cols="40" rows="6"></textarea>
                <label>Status</label>
                <select name="status">
                    <option>Active</option>
                    <option>Closed</option>
                </select>
                <label>Start Date</label>
                <input type="date" name="start" class="start" required>
                <label>End Date</label>
                <input type="date" name="end" class="end" required>

                <button type="submit" name="submit">Create</button>
            </form>
        </div>
        <button class="view-btn">View projects</button>
    </div> 
    
    
    `
}