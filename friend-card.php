<?php include_once "./head.php"; ?>

<div>
   <div class="p-3 border border-2 rounded shadow my-5">
        <h1 class="text-primary text-center mb-3">Create Friend Card</h1>

        <form action="./fri-logic.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Friend Name</label>
                <input type="text" class="form-control" name="fri_name" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Friend Phone</label>
                <input type="tel" class="form-control" name="fri_phone" required>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Friend Address</label>
                <textarea name="fri_address" rows="5" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Friend Photo</label>
                <input type="file" class="form-control" accept="image/jpeg,image/png"
                name="fri_photo" required>
            </div>
            <div class="form-check mt-3">
                <input type="checkbox" name="isFriend" id="isFriend" class="form-check-input">
                <label for="isFriend">Friend</label>
            </div>
            <button class="btn btn-primary my-3">Create Friend List</button>
        </form>
    </div> 

    <div class="mb-5">
        <?php
            $dataFileName = "friend-data.json";

            $friends = json_decode(file_get_contents($dataFileName),true);
        ?>

        <?php foreach($friends as $key => $friend): ?>
        <div class="card w-75 mx-auto mb-3 bg-secondary shadow">
            <div class="card-body text-center">
                <img src="<?= $friend["photo"] ?>" alt="" width="100" height="100" class="rounded-circle">
                <h3 class="my-2"><?= $friend["fri_name"]; ?></h3>
                <h5 class="mb-3"><?= $friend["fri_phone"]; ?></h5>
                <a href="./fri-detail.php?index=<?= $key; ?>" class="btn btn-primary mx-2">
                    Detail
                </a>
                <a href="./fri-delete.php?=index=<?= $key; ?>" class="btn btn-danger mx-2">
                    Delete
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

</div>




<?php include_once "./footer.php"; ?>