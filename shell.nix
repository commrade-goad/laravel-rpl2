{ pkgs ? import <nixpkgs> {} }:

pkgs.mkShell {
    packages = [
        pkgs.php84
        pkgs.php84Packages.composer
        pkgs.laravel
        pkgs.phpactor
        pkgs.iconv
        pkgs.php83Extensions.mbstring
        pkgs.sqlite
    ];
}
