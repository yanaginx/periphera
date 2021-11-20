<div class="m-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href=".">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>
</div>

<div class="wrapper">
    <div class="row content">
        <div class="col-md-4 profile">
            <div class="d-flex flex-column align-items-center text-center">
                <img class="rounded-circle" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
            </div>
            <div class="d-flex flex-column align-items-center text-center">
                <?php echo $data['username']; ?>
            </div>
        </div>
        
        <div class="col-md-8 infomation">
            <form action="./users/details" method="POST">
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="label" for="fname">First Name</label>
                        <input type="text" class="form-control" placeholder="first name" value="<?php echo $data['fname']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="label" for="lname">Last Name</label>
                        <input type="text" class="form-control" placeholder="last name" value="<?php echo $data['lname']; ?>">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="email" value="<?php echo $data['email'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="label" for="phone">Phone Number</label>
                        <input type="text" class="form-control" placeholder="phone number" value="<?php echo $data['phone']; ?>">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label class="label" for="address_1">Address 1</label>
                        <input type="text" class="form-control" placeholder="address 1" value="<?php echo $data['address_1']; ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="label" for="address_1">Address 2</label>
                        <input type="text" class="form-control" placeholder="address 2" value="<?php echo $data['address_2']; ?>">
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="label" for="country">Country</label>
                        <input type="text" name="email" class="form-control" placeholder="country" value="<?php echo $data['country'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label class="label" for="zipcode">Zipcode</label>
                        <input type="text" class="form-control" placeholder="zip code" value="<?php echo $data['zipcode']; ?>">
                    </div>
                </div>

                <div class="button">
                    <button type="submit" name="saveuser" class="btn btn-outline-success save">Save</button>
                    <button type="button" name="cancelupdate" class="btn btn-outline-danger cancel">Cancel</button>
                </div>
            </form>
        </div>
    </div>
    
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>