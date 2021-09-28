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
        $this->assertEquals('accommodations', (new Accomondation)->endpoint());
        $this->assertEquals('accommodationscontingents', (new AccommodationContingent)->endpoint());
        $this->assertEquals('accommodationsperiods', (new AccommodationPeriod)->endpoint());
        $this->assertEquals('accommodationspricingoptions', (new AccommodationPricingOption)->endpoint());

        $this->assertEquals('vacationrentalspricemodifications', (new VacationRentalPriceModification)->endpoint());
        $this->assertEquals('vacationrentalsperiods', (new VacationRentalPeriod)->endpoint());
        $this->assertEquals('vacationrentalsamenities', (new VacationRentalAmenity)->endpoint());
        $this->assertEquals('vacationrentals', (new VacationRental)->endpoint());

        $this->assertEquals('users', (new User )->endpoint());
        $this->assertEquals('templates', (new Template )->endpoint());
        $this->assertEquals('tags', (new Tag)->endpoint());
        $this->assertEquals('settings', (new Setting)->endpoint());
        $this->assertEquals('subtypes', (new Subtype)->endpoint());

        $this->assertEquals('suppliers', (new Supplier )->endpoint());
        $this->assertEquals('suppliersservices', (new SupplierService )->endpoint());
        $this->assertEquals('suppliersservicescontingents', (new SupplierServiceContingent )->endpoint());
        $this->assertEquals('suppliersservicesperiods', (new SupplierServicePeriod )->endpoint());
        $this->assertEquals('suppliersservicespricingoptions', (new SupplierServicePricingOption  )->endpoint());


        $this->assertEquals('travelsseasons', (new TravelSeason)->endpoint());
        $this->assertEquals('travelspassengers', (new TravelPassenger )->endpoint());
        $this->assertEquals('travelsdates', (new TravelDate )->endpoint());
        $this->assertEquals('travelsbricksaccommodations', (new TravelBrickAccommodation)->endpoint());
        $this->assertEquals('travelsbricks', (new TravelBrick)->endpoint());
        $this->assertEquals('travels', (new Travel)->endpoint());

        $this->assertEquals('recordfollowers', (new RecordFollower)->endpoint());
        $this->assertEquals('relations', (new Relation)->endpoint());
        $this->assertEquals('resources', (new Resource)->endpoint());
        $this->assertEquals('recordfollowers', (new  RecordFollower )->endpoint());
        $this->assertEquals('resourcesrecords', (new ResourceRecord)->endpoint());
        $this->assertEquals('roles', (new Role)->endpoint());
        $this->assertEquals('roundtrips', (new Roundtrip)->endpoint());

        $this->assertEquals('operationsbookings', (new OperationBooking )->endpoint());
        $this->assertEquals('operationsbookingsservices', (new OperationBookingService )->endpoint());
        $this->assertEquals('operationsbookingscancellationfees', (new OperationBookingCancellationFee )->endpoint());
        $this->assertEquals('operationspayments', (new OperationPayment)->endpoint());
        $this->assertEquals('operationspassengers', (new OperationPassenger)->endpoint());
        $this->assertEquals('operationsrequests', (new OperationRequest)->endpoint());

        $this->assertEquals('nonbookablecontent', (new NonBookableContent)->endpoint());
        $this->assertEquals('mealtypes', (new MealType)->endpoint());
        $this->assertEquals('languages', (new Language)->endpoint());

        $this->assertEquals('itineraryitems', (new Itineraryitem)->endpoint());
        $this->assertEquals('itineraryitemsservices', (new ItineraryitemsService)->endpoint());
        $this->assertEquals('itineraryitemsaccommodations', (new ItineraryitemAccommodation)->endpoint());

        $this->assertEquals('importdatastatus', (new ImportDataStatus)->endpoint());
        $this->assertEquals('groups', (new Group)->endpoint());
        $this->assertEquals('followups', (new Followup)->endpoint());
        $this->assertEquals('filters', (new Filter)->endpoint());
        $this->assertEquals('folders', (new Folder)->endpoint());
        $this->assertEquals('files', (new File)->endpoint());

        $this->assertEquals('emailtemplates', (new EmailTemplate)->endpoint());
        $this->assertEquals('destinations', (new Destination)->endpoint());

        $this->assertEquals('currencies', (new Currency)->endpoint());
        $this->assertEquals('countries', (new Country)->endpoint());

        $this->assertEquals('contacts', (new Contact)->endpoint());
        $this->assertEquals('contactscompanies', (new ContactCompany)->endpoint());
        $this->assertEquals('comments', (new Comment)->endpoint());

        $this->assertEquals('cloudimportconfigs', (new CloudImportConfig)->endpoint());
        $this->assertEquals('clonestatus', (new CloneStatus)->endpoint());

        $this->assertEquals('attributes', (new Attribute)->endpoint());
        $this->assertEquals('airports', (new Airport)->endpoint());

        $this->assertEquals('additionaltypes', (new AdditionalType)->endpoint());
        $this->assertEquals('additionalfields', (new AdditionalField)->endpoint());
        $this->assertEquals('additionalbookableservice', (new AdditionalBookableService)->endpoint());
    }
}
