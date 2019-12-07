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
                <div class="form-group">
                    <label for="employment_status">Employment Status </label>
                    <select name="employment_status" id="employment_status" required>
                        <option value=""></option>
                        <option value="full">Full Time</option>
                        <option value="part">Part Time</option>
                        <option value="unemployed">Unemployed</option>
                        <option value="retired">Retired</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="occupation">Occupation </label>
                    <input type="text" name="occupation" required>
                </div>
                <div class="form-group">
                    <label for="employeer_name">Name of Employeer </label>
                    <input type="text" name="employeer_name">
                </div>
                <div class="form-group">
                    <label for="work_schedule">Typical Work Schedule</label>
                    <input type="text" name="work_schedule" placeholder="M-F 8am-5pm or MWF 9am-1pm TT 1pm-5pm">
                </div>
            </fieldset>
            <fieldset>
                <legend>Puppy I'm Interest In</legend>
                <label for="puppy_name">Puppy</label>
                <input type="text" name="puppy_name" value="<?php echo htmlspecialchars($_GET['puppy_name']); ?>">
            </fieldset>
            <p>By submitting this application, I affirm that ALL information is true
                and complete and that no one in the household where the pet will
                reside has ever been convicted of animal cruelty or abuse. I agree to
                give permission for a representative of LMHR to call the references
                and veterinary practices I have listed. I understand that LMHR reserves the right to deny any adoption application with or without disclosure of cause. I also confirm that I
                have read or been explained the deposit policy for the dog I am
                applying for. I understand that if any of the information provided in
                this application or throughout the adoption process is found to have
                been falsified, my deposit will not be refunded.
            </p>
            <div class="form-group">
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