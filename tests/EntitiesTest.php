<?php

declare(strict_types=1);

namespace Tourware\Tests;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Psr7\Uri;
use GuzzleHttp\Psr7\Utils;
use PhpParser\Node\Expr\BinaryOp\Equal;
use Sigmie\Http\Contracts\JSONClient;
use Sigmie\Http\Contracts\JSONResponse;
use Sigmie\Http\JSONRequest;
use Tourware\Client;
use Tourware\Entities\AccommodationContingent;
use Tourware\Entities\AccommodationPeriod;
use Tourware\Entities\AccommodationPricingOption;
use Tourware\Entities\Accomondation;
use Tourware\Entities\AdditionalBookableService;
use Tourware\Entities\AdditionalField;
use Tourware\Entities\AdditionalType;
use Tourware\Entities\Airport;
use Tourware\Entities\Attribute;
use Tourware\Entities\CloneStatus;
use Tourware\Entities\CloudImportConfig;
use Tourware\Entities\Comment;
use Tourware\Entities\Contact;
use Tourware\Entities\ContactCompany;
use Tourware\Entities\Country;
use Tourware\Entities\Currency;
use Tourware\Entities\Destination;
use Tourware\Entities\EmailTemplate;
use Tourware\Entities\File;
use Tourware\Entities\Filter;
use Tourware\Entities\Folder;
use Tourware\Entities\Followup;
use Tourware\Entities\Group;
use Tourware\Entities\ImportDataStatus;
use Tourware\Entities\Itineraryitem;
use Tourware\Entities\ItineraryitemAccommodation;
use Tourware\Entities\ItineraryitemsService;
use Tourware\Entities\Language;
use Tourware\Entities\MealType;
use Tourware\Entities\NonBookableContent;
use Tourware\Entities\OperationBooking;
use Tourware\Entities\OperationBookingCancellationFee;
use Tourware\Entities\OperationBookingService;
use Tourware\Entities\OperationPassenger;
use Tourware\Entities\OperationPayment;
use Tourware\Entities\OperationRequest;
use Tourware\Entities\RecordFollower;
use Tourware\Entities\Relation;
use Tourware\Entities\Resource;
use Tourware\Entities\ResourceRecord;
use Tourware\Entities\Role;
use Tourware\Entities\Roundtrip;
use Tourware\Entities\Setting;
use Tourware\Entities\Subtype;
use Tourware\Entities\Supplier;
use Tourware\Entities\SupplierService;
use Tourware\Entities\SupplierServiceContingent;
use Tourware\Entities\SupplierServicePeriod;
use Tourware\Entities\SupplierServicePricingOption;
use Tourware\Entities\Tag;
use Tourware\Entities\Template;
use Tourware\Entities\Travel;
use Tourware\Entities\TravelBrick;
use Tourware\Entities\TravelBrickAccommodation;
use Tourware\Entities\TravelDate;
use Tourware\Entities\TravelPassenger;
use Tourware\Entities\TravelSeason;
use Tourware\Entities\User;
use Tourware\Entities\VacationRental;
use Tourware\Entities\VacationRentalAmenity;
use Tourware\Entities\VacationRentalPeriod;
use Tourware\Entities\VacationRentalPriceModification;
use Tourware\Operator\Contains;
use Tourware\Operator\EndsWith;
use Tourware\Operator\Equals;
use Tourware\Operator\StartsWith;
use Tourware\Orders\Asc;
use Tourware\Orders\Desc;
use Tourware\Requests\QueryRequest;

class EntitiesTest extends TestCase
{
    /**
     * @test
     */
    public function aliases()
    {
        $this->assertEquals('accommodations', (new Accomondation)->alias());
        $this->assertEquals('accommodationscontingents', (new AccommodationContingent)->alias());
        $this->assertEquals('accommodationsperiods', (new AccommodationPeriod)->alias());
        $this->assertEquals('accommodationspricingoptions', (new AccommodationPricingOption)->alias());

        $this->assertEquals('vacationrentalspricemodifications', (new VacationRentalPriceModification)->alias());
        $this->assertEquals('vacationrentalsperiods', (new VacationRentalPeriod)->alias());
        $this->assertEquals('vacationrentalsamenities', (new VacationRentalAmenity)->alias());
        $this->assertEquals('vacationrentals', (new VacationRental)->alias());

        $this->assertEquals('users', (new User )->alias());
        $this->assertEquals('templates', (new Template )->alias());
        $this->assertEquals('tags', (new Tag)->alias());
        $this->assertEquals('settings', (new Setting)->alias());
        $this->assertEquals('subtypes', (new Subtype)->alias());

        $this->assertEquals('suppliers', (new Supplier )->alias());
        $this->assertEquals('suppliersservices', (new SupplierService )->alias());
        $this->assertEquals('suppliersservicescontingents', (new SupplierServiceContingent )->alias());
        $this->assertEquals('suppliersservicesperiods', (new SupplierServicePeriod )->alias());
        $this->assertEquals('suppliersservicespricingoptions', (new SupplierServicePricingOption  )->alias());


        $this->assertEquals('travelsseasons', (new TravelSeason)->alias());
        $this->assertEquals('travelspassengers', (new TravelPassenger )->alias());
        $this->assertEquals('travelsdates', (new TravelDate )->alias());
        $this->assertEquals('travelsbricksaccommodations', (new TravelBrickAccommodation)->alias());
        $this->assertEquals('travelsbricks', (new TravelBrick)->alias());
        $this->assertEquals('travels', (new Travel)->alias());

        $this->assertEquals('recordfollowers', (new RecordFollower)->alias());
        $this->assertEquals('relations', (new Relation)->alias());
        $this->assertEquals('resources', (new Resource)->alias());
        $this->assertEquals('recordfollowers', (new  RecordFollower )->alias());
        $this->assertEquals('resourcesrecords', (new ResourceRecord)->alias());
        $this->assertEquals('roles', (new Role)->alias());
        $this->assertEquals('roundtrips', (new Roundtrip)->alias());

        $this->assertEquals('operationsbookings', (new OperationBooking )->alias());
        $this->assertEquals('operationsbookingsservices', (new OperationBookingService )->alias());
        $this->assertEquals('operationsbookingscancellationfees', (new OperationBookingCancellationFee )->alias());
        $this->assertEquals('operationspayments', (new OperationPayment)->alias());
        $this->assertEquals('operationspassengers', (new OperationPassenger)->alias());
        $this->assertEquals('operationsrequests', (new OperationRequest)->alias());

        $this->assertEquals('nonbookablecontent', (new NonBookableContent)->alias());
        $this->assertEquals('mealtypes', (new MealType)->alias());
        $this->assertEquals('languages', (new Language)->alias());

        $this->assertEquals('itineraryitems', (new Itineraryitem)->alias());
        $this->assertEquals('itineraryitemsservices', (new ItineraryitemsService)->alias());
        $this->assertEquals('itineraryitemsaccommodations', (new ItineraryitemAccommodation)->alias());

        $this->assertEquals('importdatastatus', (new ImportDataStatus)->alias());
        $this->assertEquals('groups', (new Group)->alias());
        $this->assertEquals('followups', (new Followup)->alias());
        $this->assertEquals('filters', (new Filter)->alias());
        $this->assertEquals('folders', (new Folder)->alias());
        $this->assertEquals('files', (new File)->alias());

        $this->assertEquals('emailtemplates', (new EmailTemplate)->alias());
        $this->assertEquals('destinations', (new Destination)->alias());

        $this->assertEquals('currencies', (new Currency)->alias());
        $this->assertEquals('countries', (new Country)->alias());

        $this->assertEquals('contacts', (new Contact)->alias());
        $this->assertEquals('contactscompanies', (new ContactCompany)->alias());
        $this->assertEquals('comments', (new Comment)->alias());

        $this->assertEquals('cloudimportconfigs', (new CloudImportConfig)->alias());
        $this->assertEquals('clonestatus', (new CloneStatus)->alias());

        $this->assertEquals('attributes', (new Attribute)->alias());
        $this->assertEquals('airports', (new Airport)->alias());

        $this->assertEquals('additionaltypes', (new AdditionalType)->alias());
        $this->assertEquals('additionalfields', (new AdditionalField)->alias());
        $this->assertEquals('additionalbookableservice', (new AdditionalBookableService)->alias());
    }
}
