<?php 
namespace App\Enums;

class RoleEnum {
    const Gestor = "gestor";
    const Staff = "staff";
    const Mestre = "mestre";
    const PixelArtista = "pixel_artista";
    const Arquiteto = "arquiteto";
    const Programador = "programador";

    public static function from_string(string $value) {
        $parsed = match ($value) {
            "gestor" => RoleEnum::Gestor,
            "staff" => RoleEnum::Staff,
            "mestre" => RoleEnum::Mestre,
            "pixel_artista" => RoleEnum::PixelArtista,
            "arquiteto" => RoleEnum::Arquiteto,
            "programador" => RoleEnum::Programador,
        };

        return $parsed;
    }
}
?>