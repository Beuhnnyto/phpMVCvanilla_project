  <style><?php include './views/css/styles.css' ?></style>
  <br>
  <br>
  <br>
    <table>
        <tr>
            <th>ID</th>
            <th>message</th>
            <th>Action</th>
        </tr>
        <?php foreach ($data as $row): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td>
                <a href="/delete?id=<?php echo $row['id']; ?>">Supprimer</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>Ajouter un texte</h2>
    <form method="POST" action="/add">

        <label for="title">title :</label>
        <input type="text" name="title" required>
        <br>
        <button type="submit">Ajouter</button>
    </form>

