<?php

  $colors = ['red', 'blue', 'green'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Validation</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1 class="text-center p-5 display-4">Validation</h1>
    <div class="row">
      <div class="col">
        <div class="p-5 mb-5 bg-light">
          <form class="form" method="post">
            <div class="col mb-3">
              <label class="form-label">Name</label>
              <input 
                type="text" 
                class="form-control" 
                name="name" 
                placeholder="Name" 
                value="">
              <div class="invalid-feedback">
                Name is required.
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Email</label>
              <input type="text" class="form-control <?php if(isset($errors['email'])): ?>is-invalid<?php endif; ?>" name="email" placeholder="Email" value="<?php echo $email ?? ''; ?>">
              <div class="invalid-feedback">
              <?php if(isset($errors['email'])): ?>
                  <?php echo $errors['email']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Phone</label>
              <input type="text" class="form-control <?php if(isset($errors['phone'])): ?>is-invalid<?php endif; ?>" name="phone" placeholder="Phone" value="<?php echo $phone ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['phone'])): ?>
                  <?php echo $errors['phone']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Website</label>
              <input type="text" class="form-control <?php if(isset($errors['website'])): ?>is-invalid<?php endif; ?>" name="website" placeholder="Website" value="<?php echo $website ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['website'])): ?>
                  <?php echo $errors['website']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Price</label>
              <input type="text" class="form-control <?php if(isset($errors['price'])): ?>is-invalid<?php endif; ?>" name="price" placeholder="Price" value="<?php echo $price ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['price'])): ?>
                  <?php echo $errors['price']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Age</label>
              <input type="text" class="form-control <?php if(isset($errors['age'])): ?>is-invalid<?php endif; ?>" name="age" placeholder="Age" value="<?php echo $age ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['age'])): ?>
                  <?php echo $errors['age']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Date</label>
              <input type="date" class="form-control <?php if(isset($errors['date'])): ?>is-invalid<?php endif; ?>" name="date" placeholder="Date" value="<?php echo $date ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['date'])): ?>
                  <?php echo $errors['date']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Time</label>
              <input type="time" class="form-control <?php if(isset($errors['time'])): ?>is-invalid<?php endif; ?>" name="time" placeholder="Time" value="<?php echo $time ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['time'])): ?>
                  <?php echo $errors['time']; ?>
                <?php endif; ?>
              </div>
            </div>
            <div class="col mb-3">
              <label class="form-label">Color</label>
              <select class="form-select <?php if(isset($errors['color'])): ?>is-invalid<?php endif; ?>" name="color" value="<?php echo $_POST['color'] ?? ''; ?>">
                <option value="">Select a color</option>
                <?php foreach ($colors as $c): ?>
                  <option value="<?php echo $c; ?>" <?php if($c === $color): ?> selected <?php endif; ?>><?php echo ucfirst($c); ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">
                <?php if(isset($errors['color'])): ?>
                  <?php echo $errors['color']; ?>
                <?php endif; ?>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>