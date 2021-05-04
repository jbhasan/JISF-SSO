<p align="center"><a href="http://jisf-dashboard.e-judiciary.org" target="_blank"><img src="https://n-doptor-accounts-stage.nothi.gov.bd/img/doptor.png" width="200"></a></p>

# N-DOPTOR SSO
Single Sign On for N-DOPTOR

## Installation
You can install the package via composer:

```shell
composer require sayeed/jisf-single-sign-on
```

### Laravel 7.x and above
The package will automatically register itself, so you can start using it immediately.

## Configuration

#### After installing the package, need to update or add these lines on `.env` file
- `LOGIN_SSO_URL=http://adalat.e-judiciary.org/login`
- `LOGOUT_SSO_URL=http://adalat.e-judiciary.org/logout`

#### Update`web.php` in `routes` directory
- Remove `Auth::routes();`, if exists.

#### Use `jisf.auth` for N-DOPTOR SSO authentication
```
Route::middleware(['jisf.auth'])->group(function () {
    /// here your authentication route
});
```



## Credits

- [Md. Hasan Sayeed](https://github.com/jbhasan)
- [Tappware Solutions Limited](https://tappware.com)

For any questions, you can reach out to the author of this package, Md. Hasan Sayeed.

Thank you for using it.
