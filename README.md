# JISF SSO
Single Sign On for JISF

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



## Credits

- [Md. Hasan Sayeed](https://github.com/jbhasan)

For any questions, you can reach out to the author of this package, Md. Hasan Sayeed.

Thank you for using it.
