<main class="container">
    <h2 class="page-head">
        <?php the_title(); ?>
    </h2>
    <?php while (have_posts()) : the_post(); ?>
        <div class="page-content">
            <?php the_content(); ?>
        </div>
    <?php endwhile; ?>
    <div class="adopt-form">
        <form method="post">
            <fieldset>
                <legend>Contact Info</legend>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="foster_name" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" name="age" id="age" required>
                </div>
                <div class="form-group">
                    <label for="address">Home Address </label>
                    <input type="text" name="address" id="address" required>
                </div>
                <div class="form-group">
                    <label for="cell_number">Cell Number </label>
                    <input type="tel" name="cell" id="cell" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx" required>
                </div>
                <div class="form-group">
                    <label for="work_number">Work Number </label>
                    <input type="tel" name="work" id="work" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
                </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" name="email" id="email" required>
                </div>
                <div class="form-group">
                    <label for="contact_window">Best Time to Contact </label>
                    <input type="text" name="contact_window" id="contact_window" placeholder="3pm - 7pm Monday Wednesday Friday" required>
                </div>
            </fieldset>
            <fieldset>
                <legend>Work Info</legend>
                <div class="form-group" id="employment">
                    <label for="employment_status">Employment Status </label>
                    <select name="employment_status" id="employment_status" required>
                        <option value=""></option>
                        <option value="full">Full Time</option>
                        <option value="part">Part Time</option>
                        <option value="unemployed">Unemployed</option>
                        <option value="retired">Retired</option>
                    </select>
                </div>
                <div class="form-group" id="employed">
                    <label for="occupation">Occupation </label>
                    <input type="text" name="occupation" class="work_option">
                </div>
                <div class="form-group" id="employed">
                    <label for="employeer_name">Name of Employeer </label>
                    <input type="text" name="employeer_name" class="work_option">
                </div>
                <div class="form-group" id="employed">
                    <label for="work_schedule">Typical Work Schedule</label>
                    <input type="text" name="work_schedule" class="work_option" placeholder="M-F 8am-5pm or MWF 9am-1pm TT 1pm-5pm">
                </div>
            </fieldset>
            <fieldset>
                <legend>Home Environment</legend>
                <div class="form-group">
                    <label for="own_or_rent">Do you own or rent your home?</label>
                    <select name="own_or_rent" id="own_or_rent" required>
                        <option value="0"></option>
                        <option value="1">Own</option>
                        <option value="2">Rent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="landlord_name">Landlord Name</label>
                    <input type="text" name="landlord_name" class="landlord">

                    <label for="landlord_phone">Landlord Phone Number</label>
                    <input type="tel" name="landlord_phone" class="landlord" id="landlord_phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
                </div>
                <div class="form-group">
                    <label for="fence_desc">Is your yard fenced?</label>
                    <input type="text" name="fence_desc" id="fence_desc" placeholder="If yes, explain what type of fence you have.">
                </div>
                <div class="form-group">
                    <label for="number_in_household">How many people live in your home?</label>
                    <input type="number" name="number_in_household" id="number_in_household">
                </div>
                <div class="form-group">
                    <label for="adult_age_list">Please list ages of all adults(18 and older) besides yourself, currently residing in your home.
                    </label>
                    <input type="text" name="adult_age_list" id="adult_age_list">
                </div>
                <div class="form-group">
                    <label for="child_age_list">Ages of ALL CHILDREN (18 and under) currently residing in your home.</label>
                    <input type="text" name="child_age_list" id="child_age_list">
                </div>
                <div class="form-group">
                    <label for="allergies">Does anyone in your household have allergies?</label>
                    <input type="text" name="allergies" id="allergies" placeholder="If yes, please explain">
                </div>
                <div class='form-group'>
                    <label for='time_alone'>How much time, on average, will the dog spend alone?</label>
                    <input type='text' name='time_alone' id='time_alone'>
                </div>
                <div class='form-group'>
                    <label for='alone_precautions'>If more than 4 hours, do you have a plan to ensure that the dog is cared for?</label>
                    <input type='text' name='alone_precautions' id='alone_precautions'>
                </div>
                <div class='form-group'>
                    <label for='sleeping_arrangments'>Where will the dog sleep at night?</label>
                    <input type='text' name='sleeping_arrangments' id='sleeping_arrangments'>
                </div>
                <div class='form-group'>
                    <label for='time_together'>Describe where the dog will spend his/her time when you ARE at home.</label>
                    <input type='text' name='time_together' id='time_together'>
                </div>
                <div class='form-group'>
                    <label for='time_along'>Describe where the dog will spend his/her time when you are NOT at home.</label>
                    <input type='text' name='time_along' id='time_along'>
                </div>
            </fieldset>
            <fieldset>
                <legend>Current & Past Pets</legend>
                <div class='form-group'>
                    <label for='pet_members'>Do you currently have any other pets?</label>
                    <input type='text' name='pet_members' id='pet_members' placeholder="If yes, please list name, species, gender, and age of each pet.">
                </div>
                <div class='form-group'>
                    <label for='spayed'>Have all of your other pets, both past and present, been spayed or
                        neutered?
                    </label>
                    <input type="text" name="spayed" id="spayed" placeholder="If no, please explain. Other, just enter Yes.">
                </div>
                <div class='form-group'>
                    <label for='euthanasia'>Have you ever had to put a pet to sleep?</label>
                    <input type='text' name='euthanasia' id='euthanasia' placeholder="If yes, can you explain the circumstances? Other wise, just enter No.">
                </div>
                <div class='form-group'>
                    <label for='exercise'>How do you plan to exercise the dog?</label>
                    <input type='text' name='exercise' id='exercise'>
                </div>
                <div class='form-group'>
                    <label for='obedience_classes'>If necessary, are you willing to take the dog to obedience classes?</label>
                    <select name="obedience_classes" id="obedience_classes" required>
                        <option value="0"></option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
            </fieldset>
            <fieldset>
                <legend>Veterinarain Information</legend>
                <div class='form-group'>
                    <label for='veterinarian'>Do you currently have an established relationship with a veterinarian?
                    </label>
                    <select name="veterinarian" id="veterinarian" required>
                        <option value="0"></option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for='vet_name'>Veterinarian Name</label>
                    <input type='text' class="vet_details" name="vet_name" id="vet_name">
                </div>
                <div class='form-group'>
                    <label for='vet_number'>Veterinarain Phone Number</label>
                    <input type="tel" class="vet_details" name="vet_number" id="vet_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx">
                </div>
                <div class='form-group'>
                    <label for='vet_city'>City</label>
                    <input type='text' class="vet_details" name="vet_city" id="vet_city">
                </div>
                <div class='form-group'>
                    <label for='vet_state'>State</label>
                    <input type='text' class="vet_details" name="vet_state" id="vet_state">
                </div>
            </fieldset>
            <fieldset>
                <legend>Puppy I'm Interest In</legend>
                <label for="puppy_name">Puppy</label>
                <input type="text" name="puppy_name" value="<?php echo htmlspecialchars($_GET['puppy_name'] ?? ""); ?>">
            </fieldset>
            <p>By submitting this application, I affirm that ALL information is true
                and complete and that no one in the household where the pet will
                reside has ever been convicted of animal cruelty or abuse. I agree to
                give permission for a representative of LMHR to call the references
                and veterinary practices I have listed. I understand that LMHR reserves the right to deny any adoption application with or without disclosure of cause. I also confirm that I
                have read or been explained the deposit policy for the dog I am
                applying for. I understand that if any of the information provided in
                this application or throughout the adoption process is found to have
                been falsified, my deposit will not be refunded.</p>
            <div class="form-group form_agree">
                <label for="agree">
                    By checking the checkbox below, I agree to the above terms.
                </label>
                <input type="checkbox" name="agree" id="agree">
            </div>
            <div class="form-group">
                <input type="submit" name="appSubmit" value="Submit App" class="adoption-btn">
            </div>
        </form>
    </div>
</main>