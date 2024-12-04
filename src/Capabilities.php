<?php

namespace Flobul\Meari;

class Capabilities
{
    public static $version = "1.011";
    public $enums;
    public $apps;
    public $errors;

    public function __construct()
    {
        $this->enums = array(
            "000000000000000" => array(
                "logicalId"  => "jingleVolume",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Volume de l'annonce", __FILE__),
                "unite" => "%",
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                )
            ),
            "1" => array(
                "logicalId"  => "userId",
                "type" => "info",
                "subType" => "string",
                "name" => __("Identifiant utilisateur", __FILE__)
            ),
            "3" => array(
                "logicalId"  => "deviceKey",
                "type" => "info",
                "subType" => "string",
                "name" => __("Clé de l'appareil", __FILE__)
            ),
            "10" => array(
                "logicalId"  => "expiracyCloud",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Date d'expiration service vidéo Cloud", __FILE__)
            ),
            "14" => array(
                "logicalId" => "refreshFaceList",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Rafraîchir la liste des visages", __FILE__)
            ),
            "21" => array(
                "logicalId" => "safePwd",
                "type" => "info",
                "subType" => "string",
                "name" => __("safePwd", __FILE__)
            ),
            "50" => array(
                "logicalId"  => "serialNumber",
                "type" => "info",
                "subType" => "string",
                "name" => __("Numéro de série", __FILE__)
            ),
            "51" => array(
                "logicalId"  => "firmwareCode",
                "type" => "info",
                "subType" => "string",
                "name" => __("Code du firmware", __FILE__)
            ),
            "52" => array(
                "logicalId"  => "firmwareVersion",
                "type" => "info",
                "subType" => "string",
                "name" => __("Version du firmware", __FILE__)
            ),
            "53" => array(
                array(
                    "logicalId"  => "cloudUploadEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Service de stockage vidéo sur le cloud", __FILE__)
                ),
                array(
                    "logicalId"  => "cloudUploadEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Télécharger une vidéo sur le cloud ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "cloudUploadEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Télécharger une vidéo sur le cloud OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "54" => array(
                "logicalId"  => "timeZone",
                "type" => "info",
                "subType" => "string",
                "name" => __("Fuseau horaire", __FILE__)
            ),
            "55" => array(
                "logicalId"  => "capabilities",
                "type" => "info",
                "subType" => "string",
                "name" => __("Capacités", __FILE__)
            ),
            "56" => array(
                "logicalId"  => "mac",
                "type" => "info",
                "subType" => "string",
                "name" => __("Adresse MAC", __FILE__)
            ),
            "57" => array(
                "logicalId"  => "dns",
                "type" => "info",
                "subType" => "string",
                "name" => __("Serveurs DNS", __FILE__)
            ),
            "58" => array(
                "logicalId"  => "mask",
                "type" => "info",
                "subType" => "string",
                "name" => __("Masque de sous-réseau", __FILE__)
            ),
            "59" => array(
                "logicalId"  => "router",
                "type" => "info",
                "subType" => "string",
                "name" => __("Routeur", __FILE__)
            ),
            "60" => array(
                "logicalId"  => "lastCheckTime",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Date de dernière vérification", __FILE__)
            ),
            "61" => array(
                "logicalId"  => "licenseId",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Identifiant de licence", __FILE__)
            ),
            "62" => array(
                "logicalId"  => "supportVersion",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Version du support", __FILE__)
            ),
            "63" => array(
                "logicalId"  => "deviceModel",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Modèle d'appareil", __FILE__)
            ),
            "64" => array(
                "logicalId"  => "platformCode",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Code de la plateforme", __FILE__)
            ),
            "65" => array(
                "logicalId"  => "deviceOnlineTime",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Date de connexion de l'appareil", __FILE__)
            ),
            "66" => array(
                "logicalId"  => "tp",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("tp", __FILE__)
            ),
            "67" => array(
                "logicalId"  => "nvrNeutralChannelCaps",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("nvrNeutralChannelCaps", __FILE__)
            ),
            "68" => array(
                "logicalId"  => "nvrNeutralQrCodeKey",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("nvrNeutralQrCodeKey", __FILE__)
            ),
            "69" => array(
                "logicalId"  => "mediaQuantity",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("mediaQuantity", __FILE__)
            ),
            "70" => array(
                "logicalId"  => "afterSale",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("afterSale", __FILE__)
            ),
            "100" => array(
                "logicalId"  => "wifiName",
                "type" => "info",
                "subType" => "string",
                "name" => __("Nom du WiFi", __FILE__),
                "configuration" => array(
                    "calculation" => "base64_decode('%s')",
                    "calculationBack" => "base64_encode('%s')"
                )
            ),
            "102" => array(
                array(
                    "logicalId"  => "rotateEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Rotation", __FILE__)
                ),
                array(
                    "logicalId"  => "rotateEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Rotation ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "rotateEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Rotation OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "103" => array(
                array(
                    "logicalId"  => "ledEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("LED", __FILE__)
                ),
                array(
                    "logicalId"  => "ledEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("LED ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "ledEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("LED OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "104" => array(
                array(
                    "logicalId"  => "sdRecordType",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Mode d'enregistrement sur carte SD", __FILE__)
                ),
                array(
                    "logicalId"  => "sdRecordType::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Enregistrement d'une journée complète", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "sdRecordType::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Enregistrement d'événement", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0,
                        "otherKeyToTransmit" => 105
                    )
                )
            ),
            "105" => array(
                array(
                    "logicalId"  => "sdRecordDuration",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Durée d'enregistrement sur carte SD", __FILE__)
                ),
                array(
                    "logicalId"  => "sdRecordDuration::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer la durée d'enregistrement", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "otherKeyToTransmit" => 104,
                        "updateCmdToValue" => "#select#"
                    )
                )
            ),
            "106" => array(
                array(
                    "logicalId"  => "motionDetEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Détection de mouvement", __FILE__)
                ),
                array(
                    "logicalId"  => "motionDetEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détection de mouvement ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1,
                        "otherKeyToTransmit" => 107
                    )
                ),
                array(
                    "logicalId"  => "motionDetEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détection de mouvement OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "107" => array(
                array(
                    "logicalId"  => "motionDetSensitivity",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Sensibilité de détection de mouvement", __FILE__)
                ),
                array(
                    "logicalId"  => "motionDetSensitivity::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer la sensibilité de détection de mouvement", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "listValue" => "0|Faible;1|Moyen;2|Haut",
                        "updateCmdToValue" => "#select#"
                    )
                )
            ),
            "108" => array(
                array(
                    "logicalId"  => "humanDetEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Alerte sur détection de mouvement humain", __FILE__)
                ),
                array(
                    "logicalId"  => "humanDetEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Alerte sur détection de mouvement humain ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "humanDetEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Alerte sur détection de mouvement humain OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "109" => array(
                array(
                    "logicalId"  => "soundDetEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Détection du bruit", __FILE__)
                ),
                array(
                    "logicalId"  => "soundDetEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détection du bruit ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1,
                        "otherKeyToTransmit" => 110
                    )
                ),
                array(
                    "logicalId"  => "soundDetEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détection du bruit OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "110" => array(
                array(
                    "logicalId"  => "soundDetSensitivity",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Sensibilité de détection du bruit", __FILE__)
                ),
                array(
                    "logicalId"  => "soundDetSensitivity::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer la sensibilité de détection du bruit", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "otherKeyToTransmit" => 109,
                        "listValue" => "0|Faible;1|Moyen;2|Haut",
                        "updateCmdToValue" => "#select#"
                    ),
                )
            ),
            "111" => array(
                array(
                    "logicalId"  => "cryDetEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Détection des pleurs", __FILE__)
                ),
                array(
                    "logicalId"  => "cryDetEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détection des pleurs ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "cryDetEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détection des pleurs OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "112" => array(
                array(
                    "logicalId"  => "humanTrackEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Suivi des mouvements", __FILE__)
                ),
                array(
                    "logicalId"  => "humanTrackEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Suivi des mouvements ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "humanTrackEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Suivi des mouvements OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "113" => array(
                array(
                    "logicalId"  => "dayNightMode",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Mode de vision nocturne", __FILE__)
                ),
                array(
                    "logicalId"  => "dayNightMode::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer le mode de vision nocturne", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "listValue" => "0|Automatique;1|Désactivé;2|Activé",
                        "updateCmdToValue" => "#select#"
                    ),
                )
            ),
            "114" => array(
                "logicalId"  => "sdStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("État de la carte SD", __FILE__)
            ),
            "115" => array(
                "logicalId"  => "sdCapacity",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Capacité totale de la carte SD", __FILE__),
                "unite" => "Go",
                "configuration" => array(
                    "calculation" => "%f"
                ),
            ),
            "116" => array(
                "logicalId"  => "sdRemainingCapacity",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Capacité restante de la carte SD", __FILE__),
                "unite" => "Go",
                "configuration" => array(
                    "calculation" => "%f"
                ),
            ),
            "117" => array(
                array(
                    "logicalId"  => "humanFrameEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Forme humaine", __FILE__)
                ),
                array(
                    "logicalId"  => "humanFrameEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Forme humaine ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "humanFrameEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Forme humaine OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "118" => array(
                array(
                    "logicalId"  => "sleepMode",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Mode veille", __FILE__)
                ),
                array(
                    "logicalId"  => "sleepMode::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Mode veille ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "sleepMode::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Mode veille OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "119" => array(
                "logicalId"  => "sleepTimeList",
                "type" => "info",
                "subType" => "string",
                "name" => __("Réglage de la période de surveillance et d'enregistrement", __FILE__)
            ),
            "120" => array(
                "logicalId"  => "sleepWifi",
                "type" => "info",
                "subType" => "string",
                "name" => __("sleepWifi", __FILE__)
            ),
            "121" => array(
                array(
                    "logicalId"  => "onvifEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Protocole ONVIF", __FILE__)
                ),
                array(
                    "logicalId"  => "onvifEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Protocole ONVIF ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1,
                        "otherKeyToTransmit" => 122
                    )
                ),
                array(
                    "logicalId"  => "onvifEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Protocole ONVIF OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0,
                        "otherKeyToTransmit" => 122
                    )
                )
            ),
            "122" => array(
                array(
                    "logicalId"  => "onvifPwd",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Mot de passe ONVIF", __FILE__),
                    "configuration" => array(
                        "calculation" => "base64_decode('%s')",
                        "calculationBack" => "base64_encode('%s')",
                        "otherKeyToTransmit" => 122
                    ),
                ),
                array(
                    "logicalId"  => "onvifPwd::message",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Changer le mot de passe ONVIF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#message#",
                        "calculationBack" => "base64_encode('%s')",
                        "otherKeyToTransmit" => 121,
                    )
                )
            ),
            "123" => array(
                "logicalId"  => "onvifUrl",
                "type" => "info",
                "subType" => "string",
                "name" => __("URL ONVIF", __FILE__)
            ),
            "124" => array(
                array(
                    "logicalId"  => "h265Enable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("H265", __FILE__)
                ),
                array(
                    "logicalId"  => "h265Enable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("H265 ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "h265Enable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("H265 OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "125" => array(
                array(
                    "logicalId"  => "alarmPlanList",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Période de temps", __FILE__)
                ),
                array(
                    "logicalId"  => "alarmPlanList::message",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Réglage de la période de temps", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "[#message#]"
                    ),
                    "display" => array(
                        "parameters" => array(
                            "title_disable" => 1
                        )
                    )
                )
            ),
            "126" => array(
                "logicalId"  => "ip",
                "type" => "info",
                "subType" => "string",
                "name" => __("Adresse IP", __FILE__)
            ),
            "127" => array(
                "logicalId"  => "netMode",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 3
                ),
                "name" => __("Mode de connexion", __FILE__)
            ),
            "128" => array(
                "logicalId"  => "OTAUpgradeStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("État de mise à jour", __FILE__)
            ),
            "130" => array(
                "logicalId"  => "pushUrl",
                "type" => "info",
                "subType" => "string",
                "name" => __("Flux RTMP", __FILE__)
            ),
            "131" => array(
                "logicalId"  => "chimeProRingUri",
                "type" => "info",
                "subType" => "string",
                "name" => __("chimeProRingUri", __FILE__)
            ),
            "132" => array(
                "logicalId"  => "chimeProRingVolume",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Volume de la sonnerie du carillon pro", __FILE__),
                "unite" => "%",
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                )
            ),
            "133" => array(
                "logicalId"  => "chimeProMotionUri",
                "type" => "info",
                "subType" => "string",
                "name" => __("chimeProMotionUri", __FILE__)
            ),
            "134" => array(
                "logicalId"  => "chimeProMotionVolume",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("chimeProMotionVolume", __FILE__),
                "unite" => "%",
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                )
            ),
            "135" => array(
                "logicalId"  => "chimeProRingType",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("chimeProRingType", __FILE__)
            ),
            "136" => array(
                "logicalId"  => "chimeProSnoozeInterval",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("chimeProSnoozeInterval", __FILE__)
            ),
            "137" => array(
                "logicalId"  => "chimePlan",
                "type" => "info",
                "subType" => "string",
                "name" => __("chimePlan", __FILE__)
            ),
            "140" => array(
                array(
                    "logicalId"  => "recordSwitch",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Enregistrement vidéo sur carte SD", __FILE__)
                ),
                array(
                    "logicalId"  => "recordSwitch::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Enregistrement vidéo sur carte SD ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "recordSwitch::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Enregistrement vidéo sur carte SD OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "150" => array(
                array(
                    "logicalId"  => "PirDetEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Détecteur de mouvement", __FILE__)
                ),
                array(
                    "logicalId"  => "PirDetEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détecteur de mouvement ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "PirDetEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Détecteur de mouvement OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "151" => array(
                array(
                    "logicalId"  => "PirDetSensitivity",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Sensibilité du détecteur de mouvement", __FILE__),
                    "configuration" => array(
                        "minValue" => 1,
                        "maxValue" => 5
                    )
                ),
                array(
                    "logicalId"  => "PirDetSensitivity::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Régler la sensibilité du détecteur de mouvement", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "minValue" => 1,
                        "maxValue" => 5
                    )
                )
            ),
            "152" => array(
                array(
                    "logicalId"  => "speakVolume",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Volume d'interphone", __FILE__),
                    "unite" => "%",
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 100
                    ),
                    "generic_type" => "VOLUME"
                ),
                array(
                    "logicalId"  => "speakVolume::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer le volume d'interphone", __FILE__),
                    "unite" => "%",
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "minValue" => 0,
                        "maxValue" => 100
                    ),
                    "generic_type" => "SET_VOLUME"
                )
            ),
            "153" => array(
                "logicalId"  => "powerType",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Type d'alimentation", __FILE__)
            ),
            "154" => array(
                "logicalId"  => "batteryPercent",
                "type" => "info",
                "subType" => "numeric",
                "unite" => "%",
                "isHistorize" => 1,
                "name" => __("Batterie restante", __FILE__),
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100,
                    "battery_type" => "6700mAh rechargeable"
                ),
                "generic_type" => "BATTERY"
            ),
            "155" => array(
                "logicalId"  => "batteryRemaining",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Batterie restante", __FILE__),
            ),
            "156" => array(
                "logicalId"  => "chargeStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("État de la charge", __FILE__)
            ),
            "157" => array(
                array(
                    "logicalId"  => "wirelessChimeEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Rappel de carillon", __FILE__)
                ),
                array(
                    "logicalId"  => "wirelessChimeEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Rappel de carillon ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "wirelessChimeEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Rappel de carillon OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "158" => array(
                "logicalId"  => "wirelessChimeVolume",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Volume du carillon sans fil", __FILE__),
                "unite" => "%",
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                )
            ),
            "159" => array(
                "logicalId"  => "wirelessChimeSongs",
                "type" => "info",
                "subType" => "string",
                "name" => __("Musiques disponibles du carillon sans fil", __FILE__)
            ),
            "160" => array(
                "logicalId"  => "wirelessChimeSelectSong",
                "type" => "info",
                "subType" => "string",
                "name" => __("Musique sélectionnée du carillon sans fil", __FILE__)
            ),
            "161" => array(
                array(
                    "logicalId"  => "mechanicalChimeEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Carillon électromécanique", __FILE__)
                ),
                array(
                    "logicalId"  => "mechanicalChimeEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Carillon électromécanique ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "mechanicalChimeEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Carillon électromécanique OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "162" => array(
                array(
                    "logicalId"  => "musicPlayMode",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Mode de lecture de la musique", __FILE__)
                ),
                array(
                    "logicalId"  => "musicPlayMode::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer le mode de lecture de la musique", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "minValue" => 0,
                    )
                )
            ),
            "163" => array(
                array(
                    "logicalId"  => "bellSleepDelay",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Délai de mise en veille de la sonnerie", __FILE__)
                ),
                array(
                    "logicalId"  => "bellSleepDelay::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer le délai de mise en veille de la sonnerie", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "minValue" => 0,
                    )
                )
            ),
            "164" => array(
                "logicalId"  => "bellEnterMessageTime",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("bellEnterMessageTime", __FILE__)
            ),
            "165" => array(
                "logicalId"  => "bellMaxMessageTime",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("bellMaxMessageTime", __FILE__)
            ),
            "166" => array(
                array(
                    "logicalId"  => "removeProtectAlert",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Alarme de sabotage", __FILE__),
                    "generic_type" => "SABOTAGE"
                ),
                array(
                    "logicalId"  => "removeProtectAlert::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Alarme de sabotage ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "removeProtectAlert::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Alarme de sabotage OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "167" => array(
                "logicalId"  => "flightLightSwitch",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("flightLightSwitch", __FILE__)
            ),
            "168" => array(
                "logicalId"  => "flightBrightness",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("flightBrightness", __FILE__)
            ),
            "169" => array(
                "logicalId"  => "flightSchedule",
                "type" => "info",
                "subType" => "string",
                "name" => __("flightSchedule", __FILE__)
            ),
            "170" => array(
                "logicalId"  => "doublePirStatus",
                "type" => "info",
                "subType" => "binary",
                "name" => __("doublePirStatus", __FILE__)
            ),
            "171" => array(
                "logicalId"  => "flightPirDuration",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("flightPirDuration", __FILE__)
            ),
            "173" => array(
                array(
                    "logicalId"  => "humanDetNightEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Détection de personne de nuit", __FILE__)
                ),
                array(
                    "logicalId"  => "humanDetNightEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Activer la détection de personne de nuit", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1,
                        "otherKeyToTransmit" => 108
                    )
                ),
                array(
                    "logicalId"  => "humanDetNightEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Désactiver la détection de personne de nuit", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0,
                        "otherKeyToTransmit" => 108
                    )
                )
            ),
            "174" => array(
                array(
                    "logicalId"  => "humanDetDayEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Détection de personne de jour", __FILE__)
                ),
                array(
                    "logicalId"  => "humanDetDayEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Activer la détection de personne de jour", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1,
                        "otherKeyToTransmit" => 108
                    )
                ),
                array(
                    "logicalId"  => "humanDetDayEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Désactiver la détection de personne de jour", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0,
                        "otherKeyToTransmit" => 108
                    )
                )
            ),
            "177" => array(
                array(
                    "logicalId"  => "roi",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Masque de filtrage", __FILE__)
                ),
                array(
                    "logicalId"  => "roi::message",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Changer le masque de filtrage", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#message#"
                    ),
                    "display" => array(
                        "parameters" => array(
                            "title_disable" => 1
                        )
                    )
                )
            ),
            "178" => array(
                array(
                    "logicalId"  => "alarmFrequency",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Intervalle d'alarme", __FILE__),
                ),
                array(
                    "logicalId"  => "alarmFrequency::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer l'intervalle d'alarme", __FILE__),
                    "configuration" => array(
                        "minValue" => 1,
                        "maxValue" => 6,
                        "listValue" => "6|30 secondes;1|1 minute;3|3 minutes;4|5 minutes",
                        "updateCmdToValue" => "#select#"
                    )
                )
            ),
            "179" => array(
                array(
                    "logicalId"  => "musicVolume",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Volume de musique", __FILE__),
                    "unite" => "%",
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 100
                    ),
                    "generic_type" => "VOLUME"
                ),
                array(
                    "logicalId"  => "musicVolume::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer le volume de la musique", __FILE__),
                    "unite" => "%",
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "minValue" => 0,
                        "maxValue" => 100
                    ),
                    "generic_type" => "SET_VOLUME"
                )
            ),
            "180" => array(
                "logicalId"  => "flightLinkLightingEnable",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("flightLinkLightingEnable", __FILE__)
            ),
            "181" => array(
                "logicalId"  => "faceRecognitionSwitch",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("faceRecognitionSwitch", __FILE__)
            ),
            "182" => array(
                "logicalId"  => "soundLightEnable",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("soundLightEnable", __FILE__)
            ),
            "183" => array(
                "logicalId"  => "soundLightType",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("soundLightType", __FILE__)
            ),
            "184" => array(
                "logicalId"  => "comeDeviceVolume",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("comeDeviceVolume", __FILE__),
                "unite" => "%",
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                )
            ),
            "185" => array(
                "logicalId"  => "flightManualLightingDuration",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("flightManualLightingDuration", __FILE__)
            ),
            "186" => array(
                "logicalId"  => "flightMultiSchedule",
                "type" => "info",
                "subType" => "string",
                "name" => __("flightMultiSchedule", __FILE__)
            ),
            "187" => array(
                "logicalId"  => "flightLinkSirenEnable",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("flightLinkSirenEnable", __FILE__)
            ),
            "190" => array(
                "logicalId"  => "osdEnable",
                "type" => "info",
                "subType" => "binary",
                "name" => __("osdEnable", __FILE__)
            ),
            "191" => array(
                array(
                    "logicalId"  => "logoSwitch",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Filigrane", __FILE__)
                ),
                array(
                    "logicalId"  => "logoSwitch::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Filigrane ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "logoSwitch::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Filigrane OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "193" => array(
                "logicalId"  => "userAccount",
                "type" => "info",
                "subType" => "string",
                "name" => __("Compte utilisateur", __FILE__),
                "configuration" => array(
                    "calculation" => "base64_decode('%s')",
                    "calculationBack" => "base64_encode('%s')"
                ),
            ),
            "194" => array(
                  "logicalId"  => "relay_enable",
                  "type" => "info",
                  "subType" => "string",
                  "name" => __("Relais activé", __FILE__)
              ),
            "195" => array(
                array(
                    "logicalId"  => "abnormalNoiseEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Bruit anormal détecté", __FILE__)
                ),
                array(
                    "logicalId"  => "abnormalNoiseEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Bruit anormal détecté ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "abnormalNoiseEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Bruit anormal détecté OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "196" => array(
                array(
                    "logicalId"  => "timedPtzPatrol",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Patrouille régulière", __FILE__)
                ),
                array(
                    "logicalId"  => "timedPtzPatrol::set",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Ajouter une patrouille régulière", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#message#"
                    ),
                    "display" => array(
                        "parameters" => array(
                            "title_disable" => 1
                        )
                    )
                )
            ),
            "197" => array(
                array(
                    "logicalId"  => "rgbLightSwitch",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Interrupteur RGB", __FILE__),
                    "configuration" => array(
                        "hasAction" => 1
                    )
                ),
                array(
                    "logicalId"  => "rgbLightSwitch::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Interrupteur RGB ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    ),
                    "template" => array(
                        "dashboard" => "core::light",
                        "mobile" => "core::light"
                    ),
                    "generic_type" => "LIGHT_ON"
                ),
                array(
                    "logicalId"  => "rgbLightSwitch::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Interrupteur RGB OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    ),
                    "template" => array(
                        "dashboard" => "core::light",
                        "mobile" => "core::light"
                    ),
                    "generic_type" => "LIGHT_OFF"
                )
            ),
            "198" => array(
                array(
                    "logicalId"  => "rgbLightColor",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Couleur de la lumière", __FILE__),
                    "configuration" => array(
                        "calculation" => "RGBtoHTML('%s')",
                        "calculationBack" => "HTMLtoRGB('%s')"
                    ),
                ),
                array(
                    "logicalId"  => "rgbLightColor::color",
                    "type" => "action",
                    "subType" => "color",
                    "name" => __("Règlage de couleur de la lumière", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#color#",
                        "calculationBack" => "HTMLtoRGB('%s')"
                    ),
                    "template" => array(
                        "dashboard" => "core::picker",
                        "mobile" => "core::picker"
                    ),
                ),
            ),
            "199" => array(
                "logicalId"  => "rgbLightTiming",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("rgbLightTiming", __FILE__)
            ),
            "200" => array(
                array(
                    "logicalId"  => "rgbLightMode",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Mode de lumière", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "hasAction" => 1
                    ),
                ),
                array(
                    "logicalId"  => "rgbLightMode::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer le mode de lumière", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "listValue" => "0|Manuel;1|Cycle bleu-vert;2|Respiration",
                        "updateCmdToValue" => "#select#"
                    ),
                ),
            ),
            "201" => array(
                array(
                    "logicalId"  => "pirJim",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Mode de fonctionnement", __FILE__)
                ),
                array(
                    "logicalId"  => "pirJim::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer le mode de fonctionnement", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "listValue" => "0|Mode économie d'énergie;1|Mode performance;2|Mode personalisé",
                        "updateCmdToValue" => "#select#"
                    )
                )
            ),
            "202" => array(
                array(
                    "logicalId"  => "noFlk",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Anti-scintillement", __FILE__)
                ),
                array(
                    "logicalId"  => "noFlk::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer la fréquence anti-scintillement", __FILE__),
                    "configuration" => array(
                        "minValue" => 1,
                        "maxValue" => 2,
                        "listValue" => "1|50;2|60Hz;",
                        "updateCmdToValue" => "#select#"
                    )
                )
            ),
            "203" => array(
                "logicalId"  => "autoUpdate",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Mise à jour automatique", __FILE__)
            ),
            "204" => array(
                "logicalId"  => "batteryManagerInfoBean",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Gestionnaire de batterie", __FILE__)
            ),
            "205" => array(
                array(
                    "logicalId"  => "deviceWake",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Statistiques d'utilisation", __FILE__)
                ),
                array(
                    "logicalId"  => "deviceWake::",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Récupérer les statistiques d'utilisation", __FILE__)
                )
            ),
            "206" => array(
                array(
                    "logicalId"  => "homekitEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("HomeKit", __FILE__)
                ),
                array(
                    "logicalId"  => "homekitEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("HomeKit ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "homekitEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("HomeKit OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "207" => array(
                array(
                    "logicalId"  => "menPhone",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Microphone", __FILE__)
                ),
                array(
                    "logicalId"  => "menPhone::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Microphone ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "menPhone::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Microphone OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "208" => array(
                array(
                    "logicalId"  => "senSound",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Conférencier", __FILE__)
                ),
                array(
                    "logicalId"  => "senSound::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Conférencier ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "senSound::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Conférencier OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "209" => array(
                array(
                    "logicalId"  => "fullColorMode",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Mode pleine couleur", __FILE__)
                ),
                array(
                    "logicalId"  => "fullColorMode::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Mode pleine couleur ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "fullColorMode::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Mode pleine couleur OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "211" => array(
                array(
                    "logicalId"  => "raeSound",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Enregistrement vocal", __FILE__)
                ),
                array(
                    "logicalId"  => "raeSound::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Enregistrement vocal ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "raeSound::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Enregistrement vocal OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "212" => array(
                "logicalId"  => "bellPhone",
                "type" => "info",
                "subType" => "string",
                "name" => __("bellPhone", __FILE__)
            ),
            "213" => array(
                "logicalId"  => "nvrNeutralChannelMax",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("nvrNeutralChannelMax", __FILE__)
            ),
            "214" => array(
                "logicalId"  => "nvrNeutralQrCodeString",
                "type" => "info",
                "subType" => "string",
                "name" => __("nvrNeutralQrCodeString", __FILE__)
            ),
            "215" => array(
                "logicalId"  => "nvrNeutralDiskStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("nvrNeutralDiskStatus", __FILE__)
            ),
            "216" => array(
                "logicalId"  => "videoPwdIsSet",
                "type" => "info",
                "subType" => "binary",
                "name" => __("Mot de passe vidéo défini", __FILE__)
            ),
            "217" => array(
                array(
                    "logicalId"  => "videoPwd",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Cryptage vidéo", __FILE__)
                ),
                array(
                    "logicalId"  => "videoPwd::message",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Changer le cryptage ONVIF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#message#",
                        "calculationBack" => "base64_encode('%s')",
                        "otherKeyToTransmit" => 216
                    )
                )
            ),
            "218" => array(
                "logicalId"  => "sotTime",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Temps de sifflement", __FILE__)
            ),
            "219" => array(
                "logicalId"  => "timeZoneAuto",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Fuseau horaire automatique", __FILE__)
            ),
            "220" => array(
                "logicalId"  => "timeZoneTime",
                "type" => "info",
                "subType" => "string",
                "name" => __("Fuseau horaire GMT", __FILE__)
            ),
            "221" => array(
                "logicalId"  => "deviceIccid",
                "type" => "info",
                "subType" => "string",
                "name" => __("ICCID de l'appareil", __FILE__)
            ),
            "222" => array(
                "logicalId"  => "deviceImei",
                "type" => "info",
                "subType" => "string",
                "name" => __("IMEI de l'appareil", __FILE__)
            ),
            "223" => array(
                array(
                    "logicalId"  => "antiJamming",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Anti-brouillage", __FILE__)
                ),
                array(
                    "logicalId"  => "antiJamming::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Anti-brouillage ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "antiJamming::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Anti-brouillage OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "224" => array(
                "logicalId"  => "humanSensitivityLevel",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Niveau de sensibilité humaine", __FILE__)
            ),
            "230" => array(
                "logicalId"  => "soundLightAlarmPlanList",
                "type" => "info",
                "subType" => "string",
                "name" => __("soundLightAlarmPlanList", __FILE__)
            ),
            "231" => array(
                "logicalId"  => "lightSoundSelectSong",
                "type" => "info",
                "subType" => "string",
                "name" => __("lightSoundSelectSong", __FILE__)
            ),
            "232" => array(
                  array(
                    "logicalId"  => "polygonRoi",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Zone d'alarme", __FILE__),
                ),
                array(
                    "logicalId"  => "polygonRoi::message",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Changer la zone d'alarme", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#message#"
                    ),
                    "display" => array(
                        "parameters" => array(
                            "title_disable" => 1
                        )
                    )
                )
            ),
            "234" => array(
                "logicalId"  => "AIdetect",
                "type" => "info",
                "subType" => "string",
                "name" => __("Détection IA", __FILE__)
            ),
            "235" => array(
                "logicalId"  => "uploadVideo",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("uploadVideo", __FILE__)
            ),
            "235" => array(
                "logicalId"  => "petThrowWarning",
                "type" => "info",
                "subType" => "string",
                "name" => __("petThrowWarning", __FILE__)
            ),
            "238" => array(
                "logicalId"  => "infraredLight",
                "type" => "info",
                "subType" => "string",
                "name" => __("Lumière infrarouge", __FILE__)
            ),
            "241" => array(
                array(
                    "logicalId"  => "tempHumidityEnable",
                    "type" => "info",
                    "subType" => "binary",
                    "isHistorize" => 1,
                    "name" => __("Alarme de température de d'humidité", __FILE__)
                ),
                array(
                    "logicalId"  => "tempHumidityEnable::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Alarme de température de d'humidité ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "tempHumidityEnable::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Alarme de température de d'humidité OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "242" => array(
                array(
                    "logicalId"  => "temperatureMax",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Température maximale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "calculation" => "%d / 1000",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "TEMPERATURE"
                ),
                array(
                    "logicalId"  => "temperatureMax::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer la température maximale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "TEMPERATURE"
                ),
            ),
            "243" => array(
                array(
                    "logicalId"  => "temperatureMin",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Température minimale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "calculation" => "%d / 1000",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "TEMPERATURE"
                ),
                array(
                    "logicalId"  => "temperatureMin::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer la température minimale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "TEMPERATURE"
                ),
            ),
            "244" => array(
                array(
                    "logicalId"  => "humidityMax",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Humidité maximale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "calculation" => "%d / 1000",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "HUMIDITY"
                ),
                array(
                    "logicalId"  => "humidityMax::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer l'humidité maximale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "HUMIDITY"
                ),
            ),
            "245" => array(
                array(
                    "logicalId"  => "humidityMin",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Humidité minimale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "calculation" => "%d / 1000",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "HUMIDITY"
                ),
                array(
                    "logicalId"  => "humidityMin::slider",
                    "type" => "action",
                    "subType" => "slider",
                    "name" => __("Changer l'humidité minimale", __FILE__),
                    "unite" => "°C",
                    "configuration" => array(
                        "updateCmdToValue" => "#slider#",
                        "calculationBack" => "%d * 1000"
                    ),
                    "template" => array(
                        "dashboard" => "core::tile",
                        "mobile" => "core::tile",
                        "parameters" => array(
                            "fontcolor" => "white"
                        )
                    ),
                    "generic_type" => "HUMIDITY"
                ),
            ),
            "263" => array(
                "logicalId"  => "petAlarm",
                "type" => "info",
                "subType" => "string",
                "name" => __("petAlarm", __FILE__)
            ),
            "264" => array(
                "logicalId"  => "petAlarmEnable",
                "type" => "info",
                "subType" => "string",
                "name" => __("petAlarmEnable", __FILE__)
            ),
            "266" => array(
                "logicalId"  => "lowThreshold",
                "type" => "info",
                "subType" => "string",
                "name" => __("lowThreshold", __FILE__)
            ),
            "267" => array(
                "logicalId"  => "fullTimeFrameRate",
                "type" => "info",
                "subType" => "string",
                "name" => __("fullTimeFrameRate", __FILE__)
            ),
            "272" => array(
                "logicalId"  => "aovRecordDelay",
                "type" => "info",
                "subType" => "string",
                "name" => __("aovRecordDelay", __FILE__)
            ),
            "274" => array(
                "logicalId"  => "aovNightMode",
                "type" => "info",
                "subType" => "string",
                "name" => __("aovNightMode", __FILE__)
            ),
            "275" => array(
                "logicalId"  => "aovWorkMode",
                "type" => "info",
                "subType" => "string",
                "name" => __("aovWorkMode", __FILE__)
            ),
            "275" => array(
                array(
                    "logicalId"  => "aovWorkMode",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Mode travail", __FILE__)
                ),
                array(
                    "logicalId"  => "aovWorkMode::on",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Mode travail ON", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 1
                    )
                ),
                array(
                    "logicalId"  => "aovWorkMode::off",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Mode travail OFF", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => 0
                    )
                )
            ),
            "276" => array(
                array(
                    "logicalId"  => "musicTime",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Minuterie de la musique", __FILE__)
                ),
                array(
                    "logicalId"  => "musicTime::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer la minuterie de la musique", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 3600,
                        "listValue" => "0|Arrêter;600|10 minutes;1800|30 minutes;3600|1 heure",
                        "updateCmdToValue" => "#select#"
                    ),
                )
            ),
            "277" => array(
                array(
                    "logicalId"  => "musicCyclical",
                    "type" => "info",
                    "subType" => "numeric",
                    "isHistorize" => 1,
                    "name" => __("Répétition de la musique", __FILE__)
                ),
                array(
                    "logicalId"  => "musicCyclical::select",
                    "type" => "action",
                    "subType" => "select",
                    "name" => __("Changer la répétition de la musique", __FILE__),
                    "configuration" => array(
                        "minValue" => 0,
                        "maxValue" => 2,
                        "listValue" => "0|En boucle;1|Rétérer 1 fois;2|Aléatoire",
                        "updateCmdToValue" => "#select#"
                    ),
                )
            ),
            "800" => array(
                "logicalId"  => "resetDevice",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Réinitialiser l'appareil", __FILE__)
            ),
            "803" => array(
                "logicalId"  => "OTAUpgrade",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Mise à jour OTA", __FILE__)
            ),
            "806" => array(
                array(
                    "logicalId"  => "formatSdcard",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Carte SD formatée", __FILE__)
                ),
                array(
                    "logicalId"  => "formatSdcard::",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Formater une carte SD", __FILE__)
                )
            ),
            "807" => array(
                array(
                    "logicalId"  => "startPTZ",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("PTZ", __FILE__)
                ),
                array(
                    "logicalId"  => "startPTZ::up",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ haut", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":0,\"ts\":20,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                ),
                array(
                    "logicalId"  => "startPTZ::down",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ bas", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":0,\"ts\":-20,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                ),
                array(
                    "logicalId"  => "startPTZ::left",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ gauche", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":-80,\"ts\":0,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                ),
                array(
                    "logicalId"  => "startPTZ::right",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ droite", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":80,\"ts\":0,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                )
            ),
            "808" => array(
                array(
                    "logicalId"  => "stopPTZ",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Arrêt PTZ", __FILE__)
                ),
                array(
                    "logicalId"  => "stopPTZ::set",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Arrêter PTZ", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"t\":\"#microtime#\"}"
                    )
                )
            ),
            "809" => array(
                array(
                    "logicalId"  => "refreshProperty",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Propriétés rafraichies", __FILE__)
                ),
                array(
                    "logicalId"  => "refreshProperty::",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Rafraîchir les propriétés", __FILE__)
                )
            ),
            "810" => array(
                "logicalId"  => "810",
                "type" => "info",
                "subType" => "string",
                "name" => __("Informations matériel", __FILE__)
            ),
            "811" => array(
                "logicalId"  => "bindWirelessChime",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Associer le carillon sans fil", __FILE__)
            ),
            "812" => array(
                "logicalId"  => "unbindWirelessChime",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Désassocier le carillon sans fil", __FILE__)
            ),
            "813" => array(
                "logicalId"  => "unlockBattery",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Débloquer la batterie", __FILE__)
            ),
            "816" => array(
                "logicalId"  => "relay",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Relais", __FILE__)
            ),
            "821" => array(
                array(
                    "logicalId"  => "musicPlayControl",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Contrôle multimédia", __FILE__)
                ),
                array(
                    "logicalId"  => "musicPlayControl::message",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Modifier le contrôle multimédia", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"id\":\"#title#\",\"cmd\":\"#message#\"}"
                    ),
                    "display" => array(
                        "parameters" => array(
                            "title_placeholder" => "c35a1af",
                            "message_placeholder" => "play|pause",
                            "title_possibility_list" => "c35a1af,c35a2af,c35a3af,c35a4af,c35a5af,c35a6af,c35a7af,c35a8af,c35a9af,c35a10af,c35a12af,c35a13af,c35a14af,c35a15af,c35a16af,c35a17af,c35a18af"
                        )
                    )
                )
            ),
            "822" => array(
                array(
                    "logicalId"  => "ptzPatrol",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Patrouille", __FILE__),
                ),
                array(
                    "logicalId"  => "ptzPatrol::set",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Démarrer patrouille", __FILE__)
                )
            ),
            "823" => array(
                "logicalId"  => "flightSirenSwitch",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("flightSirenSwitch", __FILE__)
            ),
            "824" => array(
                "logicalId"  => "relay_status",
                "type" => "info",
                "subType" => "string",
                "name" => __("État du relais", __FILE__)
            ),
            "825" => array(
                "logicalId"  => "allAlarms",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("allAlarms", __FILE__)
            ),
            "827" => array(
                "logicalId"  => "jinglePlan",
                "type" => "info",
                "subType" => "string",
                "name" => __("jinglePlan", __FILE__)
            ),
            "828" => array(
                "logicalId"  => "jinglePlanEnable",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("jinglePlanEnable", __FILE__)
            ),
            "830" => array(
                "logicalId"  => "removeNvrIpc",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("removeNvrIpc", __FILE__)
            ),
            "831" => array(
                array(
                    "logicalId"  => "allowDiscovered",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Autorisé à être découvert", __FILE__)
                ),
                array(
                    "logicalId"  => "allowDiscovered::set",
                    "type" => "action",
                    "subType" => "message",
                    "name" => __("Autoriser à être découvert", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "#message#"
                    ),
                    "display" => array(
                        "parameters" => array(
                            "title_disable" => 1
                        )
                    )
                )
            ),
            "832" => array(
                "logicalId"  => "nvrStartSearchDevice",
                "type" => "info",
                "subType" => "string",
                "name" => __("nvrStartSearchDevice", __FILE__)
            ),
            "833" => array(
                "logicalId"  => "nvrAddDevice",
                "type" => "info",
                "subType" => "string",
                "name" => __("nvrAddDevice", __FILE__)
            ),
            "834" => array(
                "logicalId"  => "nvrAllDayRecord",
                "type" => "info",
                "subType" => "string",
                "name" => __("nvrAllDayRecord", __FILE__)
            ),
            "835" => array(
                "logicalId"  => "nvrAllAlarm",
                "type" => "info",
                "subType" => "string",
                "name" => __("nvrAllAlarm", __FILE__)
            ),
            "836" => array(
                "logicalId"  => "nvrRequestAddDevice",
                "type" => "info",
                "subType" => "string",
                "name" => __("nvrRequestAddDevice", __FILE__)
            ),
            "837" => array(
                "logicalId"  => "receptacleSwitch",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("receptacleSwitch", __FILE__)
            ),
            "841" => array(
                array(
                    "logicalId"  => "startPTZ2",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("PTZ2", __FILE__)
                ),
                array(
                    "logicalId"  => "startPTZ2::up",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ2 haut", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":0,\"ts\":20,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                ),
                array(
                    "logicalId"  => "startPTZ2::down",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ2 bas", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":0,\"ts\":-20,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                ),
                array(
                    "logicalId"  => "startPTZ2::left",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ2 gauche", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":-80,\"ts\":0,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                ),
                array(
                    "logicalId"  => "startPTZ2::right",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("PTZ2 droite", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"ps\":80,\"ts\":0,\"zs\":0,\"t\":\"#microtime#\"}"
                    )
                )
            ),
            "842" => array(
                array(
                    "logicalId"  => "stopPTZ2",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("Arrêt PTZ2", __FILE__)
                ),
                array(
                    "logicalId"  => "stopPTZ2::set",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Arrêter PTZ2", __FILE__),
                    "configuration" => array(
                        "updateCmdToValue" => "{\"t\":\"#microtime#\"}"
                    )
                )
            ),
            "843" => array(
                "logicalId"  => "petSoundSet",
                "type" => "info",
                "subType" => "string",
                "name" => __("petSoundSet", __FILE__)
            ),
            "844" => array(
                "logicalId"  => "petFeedCall",
                "type" => "info",
                "subType" => "string",
                "name" => __("petFeedCall", __FILE__)
            ),
            "845" => array(
                "logicalId"  => "petFeed",
                "type" => "info",
                "subType" => "string",
                "name" => __("petFeed", __FILE__)
            ),
            "846" => array(
                "logicalId"  => "jingleAutoAddDevice",
                "type" => "info",
                "subType" => "string",
                "name" => __("jingleAutoAddDevice", __FILE__)
            ),
            "847" => array(
                array(
                    "logicalId"  => "ptzCalibration",
                    "type" => "info",
                    "subType" => "numeric",
                    "name" => __("Correction PTZ", __FILE__),
                ),
                array(
                    "logicalId"  => "ptzCalibration::set",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Lancer une correction PTZ", __FILE__)
                )
            ),
            "849" => array(
                "logicalId"  => "cameraLinkage",
                "type" => "info",
                "subType" => "string",
                "name" => __("cameraLinkage", __FILE__)
            ),
            "850" => array(
                "logicalId"  => "petFeed2",
                "type" => "info",
                "subType" => "string",
                "name" => __("petFeed2", __FILE__)
            ),
            "851" => array(
                "logicalId"  => "cameraControl",
                "type" => "info",
                "subType" => "string",
                "name" => __("cameraControl", __FILE__)
            ),
            "1001" => array(
                "logicalId"  => "OTAUpgradeDownload",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Téléchargement de la mise à jour", __FILE__)
            ),
            "1002" => array(
                "logicalId"  => "OTAUpgradeUpdate",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Mise à jour en cours", __FILE__)
            ),
            "1003" => array(
                "logicalId"  => "OTAUpgradeTotal",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Total de mise à jour", __FILE__)
            ),
            "1004" => array(
                "logicalId"  => "sdFormatProgress",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Progression du formatage de la carte SD", __FILE__)
            ),
            "1007" => array(
                "logicalId"  => "wifiStrength",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Force du signal WiFi", __FILE__),
                "unite" => "%",
                "isHistorize" => 1,
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                )
            ),
            "1008" => array(
                "logicalId"  => "temperature",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("Température", __FILE__),
                "unite" => "°C",
                "configuration" => array(
                    "calculation" => "%d / 1000"
                ),
                "template" => array(
                    "dashboard" => "core::tile",
                    "mobile" => "core::tile",
                    "parameters" => array(
                        "fontcolor" => "white"
                    )
                ),
                "generic_type" => "TEMPERATURE"
            ),
            "1009" => array(
                "logicalId"  => "humidity",
                "type" => "info",
                "subType" => "numeric",
                "name" => __("Humidité", __FILE__),
                "unite" => "%",
                "configuration" => array(
                    "minValue" => 0,
                    "maxValue" => 100
                ),
                "template" => array(
                    "dashboard" => "core::tile",
                    "mobile" => "core::tile",
                    "parameters" => array(
                        "fontcolor" => "white"
                    )
                ),
                "generic_type" => "HUMIDITY"
            ),
            "1010" => array(
                "logicalId"  => "flightLightStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("flightLightStatus", __FILE__)
            ),
            "1012" => array(
                array(
                    "logicalId"  => "musicStatus",
                    "type" => "info",
                    "subType" => "string",
                    "name" => __("État de la musique", __FILE__)
                ),
                array(
                    "logicalId"  => "musicStatus::get",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Musique suivante", __FILE__),
                    "configuration" => array(
                        "noValueToTransmit" => 1,
                        "microtimeToTransmit" => 1
                    )
                ),
            ),
            "1013" => array(
                "logicalId"  => "flightSirenDuration",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("flightSirenDuration", __FILE__)
            ),
            "1014" => array(
                "logicalId"  => "rgbLightStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("rgbLightStatus", __FILE__)
            ),
            "1015" => array(
                "logicalId"  => "nvrNeutralChannelStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("nvrNeutralChannelStatus", __FILE__)
            ),
            "1018" => array(
                "logicalId"  => "allowDiscoveredTimeLeft",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("allowDiscoveredTimeLeft", __FILE__)
            ),
            "1019" => array(
                "logicalId"  => "nvrGetSearchResult",
                "type" => "info",
                "subType" => "numeric",
                "isHistorize" => 1,
                "name" => __("nvrGetSearchResult", __FILE__)
            ),
            "1020" => array(
                "logicalId"  => "sleepStatus",
                "type" => "info",
                "subType" => "binary",
                "isHistorize" => 1,
                "name" => __("sleepStatus", __FILE__)
            ),
            "1026" => array(
                "logicalId"  => "errorMessage",
                "type" => "info",
                "subType" => "string",
                "isHistorize" => 0,
                "name" => __("Messages d'erreur", __FILE__)
            ),
            "1028" => array(
                "logicalId"  => "deviceConfigErrorCode",
                "type" => "info",
                "subType" => "string",
                "isHistorize" => 0,
                "name" => __("Code d'erreur de configuration de l'appareil", __FILE__)
            ),
            "1030" => array(
                "logicalId"  => "wifiConnectState",
                "type" => "info",
                "subType" => "string",
                "isHistorize" => 0,
                "name" => __("État de connexion WiFi", __FILE__)
            ),
            "1031" => array(
                array(
                    "logicalId"  => "deviceResetStatus",
                    "type" => "info",
                    "subType" => "string",
                    "isHistorize" => 0,
                    "name" => __("État de réinitialisation de l'appareil", __FILE__)
                ),
                array(
                    "logicalId"  => "deviceResetStatus::",
                    "type" => "action",
                    "subType" => "other",
                    "name" => __("Lancer une initilisation", __FILE__),
                    "configuration" => array(
                        "noValueToTransmit" => 1
                    )
                )
            ),
            "1032" => array(
                "logicalId"  => "deviceWifiInfo",
                "type" => "info",
                "subType" => "string",
                "isHistorize" => 0,
                "name" => __("Informations sur le WiFi de l'appareil", __FILE__)
            ),
            "1034" => array(
                "logicalId"  => "ptzInfo",
                "type" => "info",
                "subType" => "string",
                "isHistorize" => 0,
                "name" => __("Informations PTZ", __FILE__)
            ),
            "items" => array(
                "logicalId"  => "mqttIotFirstKey",
                "type" => "info",
                "subType" => "string",
                "name" => __("mqttIotFirstKey", __FILE__)
            ),
            "value" => array(
                "logicalId"  => "mqttIotThirdKey",
                "type" => "info",
                "subType" => "string",
                "name" => __("mqttIotThirdKey", __FILE__)
            )
        );

        $this->apps = array(
            "Meari" => array(
                "BRAND"            => "1",
                "APP_VERSION"      => "5.6.2",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "Meari/1.0.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "CloudEdge" => array(
                "BRAND"            => "8",
                "APP_VERSION"      => "5.7.0",
                "APP_VERSION_CODE" => "185",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "Meari/5.5.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Beaba Zen Connect" => array(
                "BRAND"            => "36",
                "APP_VERSION"      => "5.2.2",
                "APP_VERSION_CODE" => "30",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "BF/5.2.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Arenti" => array(
                "BRAND"            => "39",
                "APP_VERSION"      => "4.4.2",
                "APP_VERSION_CODE" => "202",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "Arenti/4.3.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "ISIWI" => array(
                "BRAND"            => "51",
                "APP_VERSION"      => "5.5.4",
                "APP_VERSION_CODE" => "2024061817",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "IS/5.4.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "ZUMIMALL" => array(
                "BRAND"            => "55",
                "APP_VERSION"      => "5.6.2",
                "APP_VERSION_CODE" => "2024081616",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "ZM/5.5.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "VacosSmart" => array(
                "BRAND"            => "62",
                "APP_VERSION"      => "2.4.5",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "3.1.0.2021.3.11",
                "USERAGENT"        => "VacosSmart/2.4.5 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "COOAU" => array(
                "BRAND"            => "65",
                "APP_VERSION"      => "5.4.0",
                "APP_VERSION_CODE" => "158",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "COO/5.4.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Baby Watch Plus" => array(
                "BRAND"            => "67",
                "APP_VERSION"      => "4.2.1",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "3.1.0.2021.3.11",
                "USERAGENT"        => "Bab/4.2.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "SiecoSmart" => array(
                "BRAND"            => "71",
                "APP_VERSION"      => "5.6.2",
                "APP_VERSION_CODE" => "20",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "SiecoSmart/5.2.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "My Uniden +" => array(
                "BRAND"            => "75",
                "APP_VERSION"      => "5.6.0",
                "APP_VERSION_CODE" => "2024071615",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "BF/5.4.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "CloudPlus" => array(
                "BRAND"            => "77",
                "APP_VERSION"      => "5.6.3",
                "APP_VERSION_CODE" => "2024081311",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "Cln/5.5.4 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Cloudot" => array(
                "BRAND"            => "80",
                "APP_VERSION"      => "5.5.2",
                "APP_VERSION_CODE" => "13",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "Cln/5.2.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "ieGeek Cam" => array(
                "BRAND"            => "81",
                "APP_VERSION"      => "5.5.2",
                "APP_VERSION_CODE" => "2024080811",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "ieG/5.5.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Cococam" => array(
                "BRAND"            => "82",
                "APP_VERSION"      => "5.6.1",
                "APP_VERSION_CODE" => "2024081311",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "Coc/5.5.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "ANRAN" => array(
                "BRAND"            => "84",
                "APP_VERSION"      => "5.5.3",
                "APP_VERSION_CODE" => "2024071610",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "An/5.4.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "K&F Cam" => array(
                "BRAND"            => "86",
                "APP_VERSION"      => "5.0.2",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "KF/5.0.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Elemage Cam" => array(
                "BRAND"            => "92",
                "APP_VERSION"      => "5.6.2",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "5.3.0.2023.10.23",
                "USERAGENT"        => "ELE/5.3.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "BabytimeHome" => array(
                "BRAND"            => "93",
                "APP_VERSION"      => "1.0.0",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "BTH/1.0.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "WGV" => array(
                "BRAND"            => "96",
                "APP_VERSION"      => "5.2.3",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "WGV/5.2.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Mubview" => array(
                "BRAND"            => "97",
                "APP_VERSION"      => "5.5.2",
                "APP_VERSION_CODE" => "2024080115",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "MV/5.5.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Morecam" => array(
                "BRAND"            => "98",
                "APP_VERSION"      => "5.6.1",
                "APP_VERSION_CODE" => "2024080914",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "MC/5.5.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "SV3C Cloud" => array(
                "BRAND"            => "100",
                "APP_VERSION"      => "5.2.3",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "SVC/5.2.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "SIIOOE" => array(
                "BRAND"            => "102",
                "APP_VERSION"      => "5.0.2",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "SII/5.0.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "BoifunCam" => array(
                "BRAND"            => "104",
                "APP_VERSION"      => "5.4.0",
                "APP_VERSION_CODE" => "2024061112",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "BOI/5.4.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Safeview" => array(
                "BRAND"            => "107",
                "APP_VERSION"      => "5.6.1",
                "APP_VERSION_CODE" => "2024062616",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "SVC/5.4.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "DingLink" => array(
                "BRAND"            => "108",
                "APP_VERSION"      => "1.0.0",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "DLK/1.0.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "CloudTop" => array(
                "BRAND"            => "109",
                "APP_VERSION"      => "5.4.1",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "Top/5.2.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "DEATTI" => array(
                "BRAND"            => "112",
                "APP_VERSION"      => "5.2.3",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "DET/5.2.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Topcony" => array(
                "BRAND"            => "114",
                "APP_VERSION"      => "5.2.6",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "TC/1.0.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "SecuPlus" => array(
                "BRAND"            => "115",
                "APP_VERSION"      => "5.5.0",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "3.1.0.2021.3.11",
                "USERAGENT"        => "SP/1.0.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Yes iHome" => array(
                "BRAND"            => "119",
                "APP_VERSION"      => "5.6",
                "APP_VERSION_CODE" => "2024071016",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "YH/5.1.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "VIZIUUY" => array(
                "BRAND"            => "122",
                "APP_VERSION"      => "5.2.3",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "viziuuy/5.2.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "TkenPro" => array(
                "BRAND"            => "124",
                "APP_VERSION"      => "5.2.6",
                "APP_VERSION_CODE" => "1",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "TKP/5.2.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Buzzai Pro" => array(
                "BRAND"            => "127",
                "APP_VERSION"      => "5.3.0",
                "APP_VERSION_CODE" => "2024052409",
                "SDK_VERSION"      => "5.3.0.2023.10.23",
                "USERAGENT"        => "BZ/5.3.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "oQo" => array(
                "BRAND"            => "128",
                "APP_VERSION"      => "5.5.2",
                "APP_VERSION_CODE" => "2024090614",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "Oqo/5.5.2 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "GCLink" => array(
                "BRAND"            => "129",
                "APP_VERSION"      => "1.0.0",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "4.4.0.2022.07.22",
                "USERAGENT"        => "GCLink/1.0.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "PARINNOV" => array(
                "BRAND"            => "131",
                "APP_VERSION"      => "5.4.1",
                "APP_VERSION_CODE" => "2024061316",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "Parinnov/5.4.1 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "Jennov" => array(
                "BRAND"            => "135",
                "APP_VERSION"      => "5.4.1",
                "APP_VERSION_CODE" => "2",
                "SDK_VERSION"      => "5.3.0.2023.10.23",
                "USERAGENT"        => "Jennov/5.3.0 (iPhone; iOS 17.5.1; Scale/2.00)"
            ),
            "CZEview" => array(
                "BRAND"            => "141",
                "APP_VERSION"      => "5.6.2",
                "APP_VERSION_CODE" => "2024092515",
                "SDK_VERSION"      => "5.4.0.2024.02.26",
                "USERAGENT"        => "CZE/5.5.3 (iPhone; iOS 17.5.1; Scale/2.00)"
            )
        );

        $this->errors = array(
            '1001' => __('Succès', __FILE__),
            '1002' => __('Le traitement du serveur a échoué, veuillez réessayer plus tard', __FILE__),
            '1003' => __('Le paramètre est vide', __FILE__),
            '1004' => __('Le code de vérification a été envoyé', __FILE__),
            '1005' => __('Erreur système', __FILE__),
            '1006' => __('Erreur de base de données', __FILE__),
            '1007' => __('Les données n\'existent pas', __FILE__),
            '1008' => __('Le code de vérification est erroné', __FILE__),
            '1009' => __('Le code de vérification a expiré', __FILE__),
            '1010' => __('Vous êtes déjà amis', __FILE__),
            '1011' => __('En attente de traitement', __FILE__),
            '1012' => __('Traitement OK', __FILE__),
            '1013' => __('L\'appareil existe déjà', __FILE__),
            '1014' => __('Vous avez des messages non lus', __FILE__),
            '1015' => __('Vous n\'avez aucun message non lu', __FILE__),
            '1016' => __('Partager', __FILE__),
            '1017' => __('Mot de passe incorrect', __FILE__),
            '1018' => __('Ce compte n\'existe pas', __FILE__),
            '1019' => __('Ce compte est déjà enregistré', __FILE__),
            '1020' => __('Le mot de passe est correct', __FILE__),
            '1021' => __('L\'appareil est partagé avec vous !', __FILE__),
            '1022' => __('Vous ne pouvez pas vous ajouter vous-même', __FILE__),
            '1023' => __('Votre compte est connecté à un autre endroit. Pour assurer la sécurité de votre compte, veuillez vous reconnecter !', __FILE__),
            '1024' => __('Cet ami vous a ajouté. Veuillez vérifier la liste de messages de vos amis', __FILE__),
            '1025' => __('Erreur de données d\'argent', __FILE__),
            '1026' => __('La commande a expiré', __FILE__),
            '1027' => __('Erreur de données de commande', __FILE__),
            '1028' => __('Impayé', __FILE__),
            '1029' => __('En période d\'essai', __FILE__),
            '1030' => __('L\'appareil n\'est pas reconnu', __FILE__),
            '1031' => __('La boîte aux lettres n\'existe pas', __FILE__),
            '1032' => __('Association de caméra à NVR, prise en charge maximale de 8 canaux pour chaque NVR', __FILE__),
            '1033' => __('Vous n\'avez pas la permission', __FILE__),
            '1035' => __('L\'appareil est hors ligne', __FILE__),
            '1036' => __('L\'appareil est en ligne', __FILE__),
            '1037' => __('Le code QR est invalide, veuillez le récupérer à nouveau', __FILE__),
            '1039' => __('Opération trop fréquente, veuillez réessayer après 60 secondes', __FILE__),
            '1040' => __('Ce n\'est pas votre ami', __FILE__),
            '1048' => __('Ce compte est déjà enregistré dans', __FILE__),
            '1050' => __('L\'appareil a été désactivé', __FILE__),
            '1051' => __('La commande a été payée, ne répétez pas le paiement', __FILE__),
            '1052' => __('Échec du paiement', __FILE__),
            '1057' => __('Les informations de l\'équipement ne sont pas certifiées', __FILE__),
        );
    }
}
