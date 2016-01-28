<div id="register" class="side">
    <h3>Registracija</h3>
    <form action="../script/Sregister.php" method="post">
        <table>
            <tr>
                <td>
                    E-mail
                </td>
                <td>
                    <input type="email" name="email" placeholder="johnsmith@yahoo.com" />
                </td>
            </tr>
            <tr>
                <td>
                    Korisničko ime
                </td>
                <td>
                    <input type="text" name="username" placeholder="johnsmith123" />
                </td>
            </tr>
            <tr>
                <td>
                    Šifra
                </td>
                <td>
                    <input type="password" name="password" placeholder="***********" />
                </td>
            </tr>
            <tr>
                <td>
                    Ponovi šifru
                </td>
                <td>
                    <input type="password" name="cpassword" placeholder="***********" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="right">
                    <input type="submit" name="submit" value="REGISTRUJ SE" />
                </td>
            </tr>
        </table>
    </form>
</div>