<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
      text{
        font-family: italic;
        color: #000B58; 
      }
    </style>
</head>
<body>
  <div class="p-3 mb-2 bg-info-subtle text-info-emphasis">
    <div class="container">

        <h1 style="text-align: center; margin-bottom: 10px;" name="text">Work of Tracker</h1>

        <form method="post">
            <div class="mb-2">
              <label for="name" class="form-label">Ismizngiz</label>
              <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name">
              <div id="emailHelp" class="form-text">Ismingizni to'liq kiritishingiz shar emas</div>
            </div>
            <div class="mb-2">
              <label for="exampleInputPassword1" class="form-label">Kelgan vaqt</label>
              <input type="datetime-local" class="form-control" id="arrived_at" name="arrived_at">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Ketgan vaqt</label>
                <input type="datetime-local" class="form-control" id="leaved_at" name="leaved_at">
              </div>
            <button type="submit" class="btn btn-primary">Jonatish</button>
            <br></br>
        </form>
      <?php

      require 'DB.php';
      $db = new DB();
      $pdo = $db->pdo;

      const Required_work_h_day = 8;
      if (isset($_POST['name']) && isset($_POST['arrived_at']) && isset($_POST['leaved_at']))
      {
        if(!empty($_POST['name']) && !empty($_POST['arrived_at']) && !empty($_POST['leaved_at']))
        {

          $name =$_POST['name'];
          $arrived_at = new DateTime($_POST['arrived_at']);
          $leaved_at = new DateTime($_POST['leaved_at']);

          $diff = $arrived_at->diff($leaved_at);
          $hour = $diff->h;
          $minute = $diff->i;
          $second = $diff->s;
          $total = ((Required_work_h_day*3600)-(($hour*3600)+($minute*60)));
          
          $query = "INSERT INTO infors (name,arrived_at,leaved_at,required_of) VALUES(:name,:arrived_at,:leaved_at,:required_of)";
          $stmt = $pdo->prepare($query);
          
          $stmt->bindParam(':name',$name);
          $stmt->bindValue(':arrived_at',$arrived_at->format('Y-m-d H:i'));
          $stmt->bindValue(':leaved_at',$leaved_at->format('Y-m-d H:i'));
          $stmt->bindParam(':required_of',$total);
          $stmt->execute();
          header('Location: loyha.php');
          exit();
        }
      }
      
      $query = "SELECT * FROM infors";
      $stmt = $pdo->prepare($query);
      $stmt->execute(); 
      $recordc = $stmt->fetchAll();
      ?>

    <table class="table table-striped">
         <thead>
           <tr>
             <th scope="col">#</th>
             <th scope="col">Ismi</th>
             <th scope="col">Kelgan vaqti</th>
             <th scope="col">Ketgan vaqti</th>
             <th scope="col">Ishlash kerak bolgan vaqt</th>
           </tr>
         </thead>
         <tbody>
           <?php foreach ($recordc as $index => $record): ?>
             <tr>
               <th scope="row"><?= $index + 1 ?></th>
               <td><?= ($record['name']) ?></td>
               <td><?= ($record['arrived_at']) ?></td>
               <td><?= ($record['leaved_at']) ?></td>
               <td><?= gmdate('H:i',$record['required_of']) ?></td>
             </tr>
             <?php endforeach; ?>

           </tbody>
         </table>
      </div>
    </div>
</body>
</html>