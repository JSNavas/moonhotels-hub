import { defineStore } from "pinia";
import { api } from "../utils/api";
import { Rooms } from "../types";

export const useRoomsStore = defineStore("rooms", {
  state: () => ({
    rooms: [] as Rooms[],
  }),
  actions: {
    async getRooms() {
      const response = await api.get<Rooms>("/search");
      this.rooms = response.data.rooms;
      console.log(this.rooms, "actions");
    },

    async filterRooms(data: any) {
      const payload = new URLSearchParams(data).toString();
      console.log(payload);
      // const response = await api.get(`/search?${payload}`);
      // this.rooms = response.data.rooms;
    },
  },
});
