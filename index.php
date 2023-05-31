<?php
  // function sanitize($data) {
  //   return htmlspecialchars(stripslashes(trim($data)));
  // }

  function sanitize($data) {
    return array_map(function ($value) {
      return htmlspecialchars(stripslashes(trim($value)));
    }, $data);
  }

  $colors = ['red', 'blue', 'green'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $name = sanitize($_POST['name']);

    $data = sanitize($_POST);
    extract($data);

    $errors = [];

    if (!$name) {
      $errors['name'] = 'Name is required';
    } else if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
      $errors['name'] = 'Name is invalid';
    }

    if (!$email) {
      $errors['email'] = 'Email is required';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Email is invalid';
    }

    if (!$phone) {
      $errors['phone'] = 'Phone is required';
    } else if (!preg_match('/^\d{10}$/', preg_replace("/[^0-9]/", "", $phone))) {
      $errors['phone'] = 'Phone is invalid';
    }

    if (!$website) {
      $errors['website'] = 'Website is required';
    } else if (!filter_var($website, FILTER_VALIDATE_URL)) {
      $errors['website'] = 'Website is invalid';
    }

    if (!$price) {
      $errors['price'] = 'Price is required';
    } else if (!filter_var($price, FILTER_VALIDATE_FLOAT)) {
      $errors['price'] = 'Price is invalid';
    }

    if (!$age) {
      $errors['age'] = 'Age is required';
    } else if (!filter_var($age, FILTER_VALIDATE_INT) || $age < 0) {
      $errors['age'] = 'Age is invalid';
    }

    if (!$date) {
      $errors['date'] = 'Date is required';
    } else if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
      $errors['date'] = 'Date is invalid';
    }

    if (!$time) {
      $errors['time'] = 'Time is required';
    } else if (!preg_match('/^\d{2}:\d{2}$/', $time)) {
      $errors['time'] = 'Time is invalid';
    }

    if (!$color) {
      $errors['color'] = 'Color is required';
    } else if (!in_array($color, $colors)) {
      $errors['color'] = 'Color is invalid';
    }
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
                class="form-control <?php if(isset($errors['name'])): ?>is-invalid<?php endif; ?>" 
                name="name" 
                placeholder="Name" 
                value="<?php echo $name ?? ''; ?>">
              <div class="invalid-feedback">
                <?php if(isset($errors['name'])): ?>
                  <?php echo $errors['name']; ?>
                <?php endif; ?>
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