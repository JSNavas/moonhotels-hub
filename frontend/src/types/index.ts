export interface RequestRoom {
  hotelId?: number | null;
  checkIn?: string | null;
  checkOut?: string | null;
  numberOfGuests?: number | string;
  numberOfRooms?: number | string;
  currency?: string;
}

export interface Rooms {
  rooms: Room[];
}

export interface Providers {
  hotelId: string;
  name: string;
}

export interface Room {
  roomId: number;
  rates: Rate[];
}

export interface Rate {
  mealPlanId: number;
  isCancellable: boolean;
  price: number;
}
